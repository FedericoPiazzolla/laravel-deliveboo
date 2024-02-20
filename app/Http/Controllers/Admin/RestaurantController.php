<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::with('user')->first();
        return view('admin.restaurant', compact('restaurant'));
    }
}
