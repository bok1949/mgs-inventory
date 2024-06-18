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

    public function show()
    {
        return "show";
    }

    public function edit($id)
    {
        return "edit " . $id;
    }
}
