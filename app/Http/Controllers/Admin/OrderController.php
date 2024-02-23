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

        return view('admin.order', compact('orders'));
    }
}
