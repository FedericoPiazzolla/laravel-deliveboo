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
        $order = Order::with('dishes')->where('id', $order)->first();

        $dishes = $order->dishes;

        foreach ($dishes as $dish) {
            $dish_quantity = DB::table('dish_order')
                ->select('dish_quantity')
                ->where('order_id', $order->id)
                ->where('dish_id', $dish->id)
                ->get();
        }

        return view('admin.orders.show', compact('order', 'dishes'));
    }
}
