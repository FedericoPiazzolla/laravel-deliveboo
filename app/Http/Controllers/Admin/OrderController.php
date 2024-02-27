<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('dishes')
        ->whereHas('dishes', function($query){
            $user = User::where('id', Auth::user()->id)->first();
            $restaurant = Restaurant::where('user_id', $user->id)->first();
                $query->where('restaurant_id', $restaurant->id);
            })->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show($order)
    {
        // Prendo l'ordine coi suoi piatti
        $order = Order::with('dishes')->where('id', $order)->first();

        // Prendo i piatti dell'ordine
        $dishes = $order->dishes;

        // Creo un array in cui pusherò il prezzo di ogni piatto
        $dishes_prices = [];

        // Per ogni piatto dell'ordine ne pusho il prezzo nell'array dei prezzi appena creato
        foreach ($dishes as $dish) {
            $dishes_prices[] = $dish->price * $dish->pivot->dish_quantity;
        }

        return view('admin.orders.show', compact('order', 'dishes', 'dishes_prices'));
    }
}
