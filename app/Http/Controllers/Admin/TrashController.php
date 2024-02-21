<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function trash()
    {
        $dishes = Dish::onlyTrashed()->get();
        return view('admin.trash', compact($dishes));
    }

    public function restore($id)
    {
        $dish = Dish::withTrashed()->find($id)->restore();
        return redirect()->route('admin.dishes.index');
    }
}
