<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryPageController extends Controller
{
    
    public function dashboard()
    {
        // return "Testign";
        return view('mgs-inventory.inv-dashboard.dashboard');
    }

    public function stockList()
    {
        return view('mgs-inventory.stock-management.stockList');
    }

    public function createStock()
    {
        return view('mgs-inventory.stock-management.createStock');

    }

    public function categoryListIndex()
    {
        return view('mgs-inventory.category-management.categoryListIndex');
    }

    public function createCategoryIndex()
    {
        return view('mgs-inventory.category-management.createCategoryIndex');
    }
}