<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        $dishes = Dish::all()->where('restaurant_id', $restaurant->id);

        return view('admin.dishes.index', compact('dishes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request, Dish $dish)
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->first();
        $form_data = $request->validated();
        $dish = new Dish();
        $dish->fill($form_data);
        $dish->restaurant_id = $restaurant->id;
        $dish->available = true;
        $dish->save();

        return redirect()->route('admin.dishes.show', ['dish' => $dish->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {   
        if($dish->restaurant->user_id !== Auth::user()->id) {
            abort(404);
        }
        $dish = Dish::where('slug', $dish->slug )->first();
        return view('admin.dishes.show',compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        if($dish->restaurant_id->user_id !== Auth::user()->id) {
            abort(404);
        }
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $form_data = $request->validated();

        $dish->update($form_data);

        return redirect()->route('admin.dishes.show', ['dish' => $dish->slug]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
