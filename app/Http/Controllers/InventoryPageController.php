<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryPageController extends Controller
{
    
    public function dashboard()
    {
        // return "Testign";
        return view('mgs-inventory.inv-dashboard.dashboard');
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
