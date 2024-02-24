<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();

        return response()->json([
            'results' => $types,
            'success' => true
        ]);
    }
    // public function show($id)
    // {
    //     $restaurants = Type::with('restaurants')->where('id', $id)->get();
    //     if ($restaurants) {
    //         return response()->json([
    //             'results' => $restaurants,
    //             'success' => true
    //         ]);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Questa categoria non esiste'
    //         ]);
    //     }
    // }
}
