<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('dishes', DishController::class)->parameters(['dishes' => 'dish:slug']);
    
    Route::get('trash', [TrashController::class, 'trash'])->name('trash');
    Route::post('restore/{dish}', [TrashController::class, 'restore'])->withTrashed()->name('dishes.restore');
    Route::delete("def_destroy/{dish}", [TrashController::class, "defDestroy"])->withTrashed()->name('dishes.def_destroy');

    // ordini
    Route::get('orders',[OrderController::class, 'index'])->name('orders');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});


require __DIR__.'/auth.php';
