<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $restaurant = Restaurant::where('user_id',$user->id)->first();
        $dishes = Dish::with('orders')->where('restaurant_id', $restaurant->id)->get();
        // $orders = Order::with('dish')->where('user_id', $user)->get();
        //$orders = Order::where( $dish-> );
        dd($dishes);
        return view('admin.order', compact('dishes'));
        
    }
}
