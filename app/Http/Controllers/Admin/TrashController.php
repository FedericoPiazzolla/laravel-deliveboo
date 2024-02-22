<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashController extends Controller
{
    public function trash()
    {
        $restaurantId = Auth::user()->restaurant->user_id;
        $dishes = Dish::onlyTrashed()->where('restaurant_id', $restaurantId)->get();
        return view('admin.trash', compact('dishes'));
    }

    public function restore($id)
    {
        $dish = Dish::withTrashed()->find($id)->restore();
        return redirect()->route('admin.dishes.index');
    }

    public function defDestroy($slug)
    {
        $dish = Dish::withTrashed()->where('slug', $slug)->first();

        $dish->forceDelete();

        return redirect()->back()->with('def_del_mess', "$dish->name has been permanently eliminated");
    }
}
