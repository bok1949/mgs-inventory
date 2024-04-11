<?php

use App\Http\Controllers\InventoryPageController;
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


Route::prefix('/inventory')->group(function () {
    Route::get('/', [InventoryPageController::class, 'dashboard']);
    Route::get('/show', [InventoryPageController::class, 'show']);
    Route::get('/edit/{id}', [InventoryPageController::class, 'edit']);
});


