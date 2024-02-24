<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
     public function index(Request $request){
        $dishesApi = Dish::with('restaurant');

        if ($request->has('restaurant_id')) {
            $restaurants_id = [$request->restaurant_id];
            foreach($restaurants_id as $restaurant_id) {
                $dishesApi->whereHas('restaurant', fn($query) => $query->where('id', $restaurant_id));
            }
        }

        $dishes = $dishesApi->paginate();

        if($dishes){
            return response()->json([
                'results' => $dishes,
                'success' => true
            ]);
        } else {
                  return response()->json([
                      'success' => false,
                      'message' => 'Nessun piatto trovato'
                  ]);
              }

        
     }

}
