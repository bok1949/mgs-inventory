<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryPageController extends Controller
{
    public function landing ()
    {
        return view('mgs-landing');
    }
    public function login ()
    {
        return view('mgs-inventory.inv-login.userLogin');
    }
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

    public function stockLevelIndex()
    {
        return view('mgs-inventory.stock-level-management.stockLevelIndex');

    }

    public function categoryListIndex()
    {
        return view('mgs-inventory.category-management.categoryListIndex');
    }

    public function createCategoryIndex()
    {
        return view('mgs-inventory.category-management.createCategoryIndex');
    }

    public function supplierList()
    {
        return view('mgs-inventory.supplier-management.supplierList');
    }
    
    public function createSupplier()
    {
        return view('mgs-inventory.supplier-management.createSupplier');
    }

    public function equipmentListIndex()
    {
        return view('mgs-inventory.equipment-management.equipmentListIndex');
    }

    public function createEquipmentIndex()
    {
        return view('mgs-inventory.equipment-management.createEquipmentIndex');
    }
}