<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Prendo i dati dalla richiesta
        $form_data = $request->all();

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
    }
}
