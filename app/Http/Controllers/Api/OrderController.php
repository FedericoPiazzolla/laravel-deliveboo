<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) {
        // Prendo i dati dalla richiesta
        $form_data = $request->all();

        // Istanzio un nuovo ordine
        $order = new Order();

        // Riempio i campi dell'ordine
        $order->fill($form_data);
        
        // Salvo il nuovo record dell'ordine nella tabella orders
        $order->save();

        // Associo gli id dei piatti nella richiesta all'id dell'ordine appena istanziato
        $order->dishes()->attach($order->id, [$form_data["dishes_id"]]);
    }
}
