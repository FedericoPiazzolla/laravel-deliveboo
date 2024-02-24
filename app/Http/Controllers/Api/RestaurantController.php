<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
 {
     public function index(Request $request){
         
         $restaurantsApi = Restaurant::with('types');

          if ($request->has('type_id')) {
              $types_id = [$request->type_id];
              foreach($types_id as $type_id) {
                  $restaurantsApi->whereHas('types', fn($query) => $query->where('id', $type_id));
              }
          }

          $restaurants = $restaurantsApi->paginate(6);

          if($restaurants) {
            return response()->json([
                'results' => $restaurants,
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'nessun ristorante trovato'
            ]);
        }
     }
   
 }
