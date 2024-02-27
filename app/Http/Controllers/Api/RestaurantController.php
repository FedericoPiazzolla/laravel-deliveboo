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
        // Codice per ottenere 6 ristoranti

        // Se la richiesta NON ha parametri
        if (!$request->has('type_id') && !$request->has('restaurant_id')) {
            // Prendo tutti i ristoranti
            $restaurants = Restaurant::all();

            // Inizializzo un nuovo array che conterrà i 6 ristoranti da mandare
            $restaurants_to_send = [];

            // Fintanto che la lunghezza dell'array è minore di 6
            while (sizeof($restaurants_to_send) < 6) {
                $rnd_index = rand(0, sizeof($restaurants) - 1);
                // Fintanto che nell'array non c'è il ristorante preso randomicamente dalla collection dei ristoranti
                while (!in_array($restaurants["{$rnd_index}"], $restaurants_to_send)) {
                    // Pusho nell'array dei 6 ristoranti da mandare il ristorante NON presente nel suddetto
                    $restaurants_to_send[] = $restaurants["{$rnd_index}"];
                }
            }

            return response()->json([
                'results' => $restaurants_to_send,
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
