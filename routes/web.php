<?php

use App\Http\Controllers\Inventory\InventoryPageController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', [InventoryPageController::class, 'dashboard']);

Route::prefix('/inventory')->group(function () {
    Route::get('/', [InventoryPageController::class, 'dashboard'])->name('invetory-dashboard');
    Route::get('/stock-list', [InventoryPageController::class, 'stockList'])->name('stock-list');
    Route::get('/create-stock', [InventoryPageController::class, 'createStock'])->name('create-stock-index');
    Route::get('/show', [InventoryPageController::class, 'show']);
    Route::get('/edit/{id}', [InventoryPageController::class, 'edit']);
});


