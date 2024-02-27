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
        $dishes = Dish::where('restaurant_id', $restaurantId)->onlyTrashed()->paginate(12);
        return view('admin.trash', compact('dishes'));
    }

    public function restore($slug)
    {
        $dish = Dish::withTrashed()->where('slug', $slug)->first();

        $this->checkUser($dish);

        $dish->restore();

        if ((dish::onlyTrashed()->count()) === 0) {
            return redirect()->route('admin.dishes.index')->with('trash_message', 'tutti i piatti sono stati riaggiunti');
        } else {
            return redirect()->back()->with('message', "$dish->name è stato riaggiunto alla lista piatti");
        }
    }

    public function defDestroy($slug)
    {
        $dish = Dish::withTrashed()->where('slug', $slug)->first();

        $dish->forceDelete();

        return redirect()->back()->with('def_del_mess', "$dish->name è stato eliminato definitivamente");
    }

    // function for validate user->restaurant_id
    private function checkUser(Dish $dish)
    {
        if (!$dish || $dish->restaurant->user_id !== Auth::id()) {
            abort(404);
        }
    }
}
