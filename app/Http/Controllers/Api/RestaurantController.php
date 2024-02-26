<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        // Codice per ottenere tutti i ristoranti
        
        if(!$request->has('type_id') && !$request->has('restaurant_id')) {
            $restaurants = Restaurant::all();
            return response()->json([
                'results' => $restaurants,
                'success' => true
            ]);
        }
        
        // Singolo ristorante

        if ($request->has('restaurant_id')) {
            $restaurant = Restaurant::where('id', $request->restaurant_id)->first();
            return response()->json([
                'results' => $restaurant,
                'success' => true
            ]);
        }

        // Codice per risposta in base agli id delle tipologie

        $restaurantsApi = Restaurant::with('types');
        if ($request->has('type_id')) {
            $types_id = explode(',', $request->type_id);

            foreach ($types_id as $type_id) {
                $restaurantsApi->whereHas('types', fn ($query) => $query->where('id', $type_id));
            }
            
            // Se non è stato trovato nessun ristorante
            $restaurants = $restaurantsApi->get();
            if ($restaurants->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Nessun ristorante trovato'
                ]);
            }

            // Altrimenti
            return response()->json([
                'results' => $restaurants,
                'success' => true
            ]);
        }
    }
}
