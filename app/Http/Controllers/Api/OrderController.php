<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use App\Models\Dish;
use Braintree\Gateway;
use App\Models\Order;
use App\Models\Restaurant;
use Braintree\Test\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request, Gateway $gateway)
    {
        // Prendo i dati dalla richiesta
        $form_data = $request->all();


        // Gestisco il pagamento
        $result = $gateway->transaction()->sale([
            'amount' => $form_data["total"], // Importo dell'ordine
            'paymentMethodNonce' => $form_data["payment_method_nonce"],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            // Istanzio un nuovo ordine
            $order = new Order();

            // Riempio i campi dell'ordine
            $order->fill($form_data);

            // Salvo il nuovo record dell'ordine nella tabella orders
            $order->save();

            // Preparo l'array degli id dei piatti
            $dishes_id = explode(',', $form_data["dishes_id"]);

            // Preparo l'array delle quantità di ogni piatto
            $dishes_quantities = explode(',', $form_data["dishes_quantities"]);

            // Creo un array vuoto che conterrà l'id del piatto con la sua quantità
            $dishesWithQuantities = [];

            // Ciclo entrambi gli array (id dei piatti e quantità) e li pusho nell'array appena inizializzato
            for ($i = 0; $i < count($dishes_id); $i++) {
                $dishesWithQuantities[$dishes_id[$i]] = ['dish_quantity' => $dishes_quantities[$i]];
            }

            // Associo all'ordine gli id dei piatti con le corrispettive quantità
            $order->dishes()->attach($dishesWithQuantities);

            //prelevo i dati del ristorante 
            $single_dish = Dish::where('id', $dishes_id[0])->first();
            $restaurant = Restaurant::where('id', $single_dish->restaurant_id)->first();
            $restaurant_email = $restaurant->restaurant_email;

            // Prendo i piatti dell'ordine
            $dishes = $order->dishes;

            // Creo un array in cui pusherò il prezzo di ogni piatto
            $dishes_prices = [];

            // Per ogni piatto dell'ordine ne pusho il prezzo nell'array dei prezzi appena creato
            foreach ($dishes as $dish) {
                $dishes_prices[] = $dish->price * $dish->pivot->dish_quantity;
            }

            // Preparo il totale
            $total = array_sum($dishes_prices);

            $mailToCustomer = new NewOrder($order, $total, 'customer');
            Mail::to($order->interested_user_email)->send($mailToCustomer);

            $mailToRestaurant = new NewOrder($order, $total, 'restaurant');
            Mail::to($restaurant_email)->send($mailToRestaurant);


            return response()->json([
                "result" => true,
                "message" => "Ordine salvato correttamente",
                "form_data" => $request->all(),
                "order_id" => $order->id
            ]);
        }
    }
}
