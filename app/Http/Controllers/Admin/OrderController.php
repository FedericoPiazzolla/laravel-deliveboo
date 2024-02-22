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
        $user = User::where('id', Auth::user()->id)->first();

        $orders = DB::table('orders')
        ->join('dish_order', 'dish_order.order_id', '=', 'orders.id')
        ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
        ->join('restaurants', 'dishes.restaurant_id', '=', 'restaurants.id')
        ->join('users', 'restaurants.user_id', '=', 'users.id')
        ->where('users.id', $user->id)
        ->select('orders.*', 'dishes.*', 'dish_order.*', 'restaurants.*', 'users.*') // Seleziona le colonne che desideri
        ->get();

        return view('admin.order', compact('orders'));

        // $orders = Order::all();
     
        return view('admin.order', compact('orders'));
        
    }
}
