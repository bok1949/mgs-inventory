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

Route::get('/', [InventoryPageController::class, 'landing']);
Route::get('/dashboard', [InventoryPageController::class, 'dashboard'])->name('dashboard');


Route::group(['prefix' => '/inventory', 'middleware' => 'cors'], function () {
    Route::get('/', [InventoryPageController::class, 'dashboard'])->name('invetory-dashboard');
    Route::get('/login', [InventoryPageController::class, 'login'])->name('login');
    Route::get('/stock-list', [InventoryPageController::class, 'stockList'])->name('stock-list');
    Route::get('/create-stock', [InventoryPageController::class, 'createStock'])->name('create-stock-index');
    Route::get('/stock-level-index', [InventoryPageController::class, 'stockLevelIndex'])->name('stock-level-index');

    Route::get('/category-list-index', [InventoryPageController::class, 'categoryListIndex'])->name('category-list-index');
    Route::get('/create-category-index', [InventoryPageController::class, 'createCategoryIndex'])->name('create-category-index');

    Route::get('/supplier-list', [InventoryPageController::class, 'supplierList'])->name('supplier-list');
    Route::get('/create-supplier', [InventoryPageController::class, 'createSupplier'])->name('create-supplier');

    Route::get('/equipment-list-index', [InventoryPageController::class, 'equipmentListIndex'])->name('equipment-list-index');
    Route::get('/create-equipment-index', [InventoryPageController::class, 'createEquipmentIndex'])->name('create-equipment-index');
});