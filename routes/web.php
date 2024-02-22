<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\TrashController;
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
    Route::get('dishes/restore/{id}', [TrashController::class, 'restore'])->name('restore');
    Route::delete("dishes/def_destroy/{dish}", [TrashController::class, "defDestroy"])->withTrashed()->name('dishes.def_destroy');
});


require __DIR__.'/auth.php';
