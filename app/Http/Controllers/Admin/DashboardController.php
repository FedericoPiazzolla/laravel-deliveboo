<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        return view('admin.dashboard', compact('restaurant'));
    }
}
