<?php

namespace App\Http\Livewire\MgsInventory\StockManagement;

use Livewire\Component;
use App\Models\Inventory\Product;

class ModalViewStock extends Component
{
    protected $listeners = [
        'openModalToViewStock',
    ];

    public $productCode, 
        $productName, 
        $productDescription,
        $productNote,
        $categoryName;

    public function openModalToViewStock($productId)
    {
        $product = Product::where('products.id', $productId);
        $product->join('product_categories', 'product_categories.product_id', '=', 'products.id');
        $product->join('categories', 'categories.id', '=', 'product_categories.category_id');
        $product->select([
            'products.product_code',
            'products.product_name',
            'products.description',
            'products.note',
            'categories.category_name'
        ]);

        $fetchedData = $product->first();

        $this->productCode = $fetchedData->product_code;
        $this->productName = $fetchedData->product_name;
        $this->productDescription = $fetchedData->description;
        $this->productNote = $fetchedData->note;
        $this->categoryName = $fetchedData->category_name;
    }

    public function render()
    {
        return view('livewire.mgs-inventory.stock-management.modal-view-stock');
    }
}
