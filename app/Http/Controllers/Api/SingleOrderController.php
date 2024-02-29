<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SingleOrderController extends Controller
{
    public function show(Request $request) {
        // Prendo l'ordine coi suoi piatti
        $order = Order::with('dishes')->where('id', $request->order_id)->first();

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

        return response()->json([
            "dishes" => $dishes,
            "total" => $total,
        ]);
    }
}
