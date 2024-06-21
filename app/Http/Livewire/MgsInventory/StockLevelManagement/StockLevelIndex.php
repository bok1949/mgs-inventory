<?php

namespace App\Http\Livewire\MgsInventory\StockLevelManagement;

use Livewire\Component;
use App\Models\Inventory\Product;

class StockLevelIndex extends Component
{
    public $searchProduct;

    public function openModalToAddProduct()
    {

    }

    public function render()
    {
        $allProducts = Product::orderBy('product_name', 'asc')
            ->select(
                'products.id AS productId',
                'product_code',
                'product_name',
            );
        $allProducts->join('items', 'items.product_id', '=', 'products.id');
        $allProducts->addSelect(
            'items.id AS itemId',
            'available',
            'defective',
            'unit_measurement',
            'price'
        );
        $allProducts->join('brands', 'brands.id', '=', 'items.brand_id');
        $allProducts->addSelect(
            'brand_name'
        );
        $allProducts->join('suppliers', 'suppliers.id', '=', 'items.supplier_id');
        $allProducts->addSelect(
            'supplier_name'
        );
        /** search */
        /** filters */

        $productItems = $allProducts->paginate(25);

        return view('livewire.mgs-inventory.stock-level-management.stock-level-index', compact('productItems'));
    }
}
