<?php

use App\Http\Controllers\Api\BraintreeController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\SingleOrderController;
use App\Http\Controllers\Api\TypeController;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
     return $request->user();
 });

Route::get('/restaurants', [RestaurantController::class,'index']);
//Route::get('/restaurants/{slug}', [RestaurantController::class, 'show']);

Route::get('/types', [TypeController::class, 'index']);
//Route::get('/types/{id}', [TypeController::class, 'show']);

Route::get('/dishes', [DishController::class, 'index']);
//Route::get('/dishes/{restaurant_id}', [DishController::class, 'show']);

Route::get('/show-order', [SingleOrderController::class, 'show']);

Route::get('/braintree/token', [BraintreeController::class, 'generateToken']);

Route::post('/order', [OrderController::class, 'store']);