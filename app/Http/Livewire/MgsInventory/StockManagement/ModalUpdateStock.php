<?php

namespace App\Http\Livewire\MgsInventory\StockManagement;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\Inventory\Product;
use App\Models\Inventory\Category;
use App\Models\Inventory\ProductCategory;

class ModalUpdateStock extends Component
{
    protected $listeners = [
        'openModalToUpdateStock',
    ];

    public $productId, 
        $productCode, 
        $productName,
        $productDescription, 
        $productNote,
        $categoryId;

    public $productNameRequired = false;
    
    public function openModalToUpdateStock($productId)
    {
        $product = Product::where('id', $productId);
        $product->join('product_categories', 'product_categories.product_id', '=', 'products.id');
        $product->select([
            'products.product_code',
            'products.product_name',
            'products.description',
            'products.note',
            'product_categories.category_id'
        ]);

        $fetchedData = $product->first();

        $this->productId = $productId;
        $this->productCode = $fetchedData->product_code;
        $this->productName = $fetchedData->product_name;
        $this->productDescription = $fetchedData->description;
        $this->productNote = $fetchedData->note;
        $this->categoryId = $fetchedData->category_id;

    }

    public function saveChanges()
    {
        if (empty($this->productName)) {
            $this->productNameRequired = true;

            return;
        }

        Product::where('id',  $this->productId)
            ->update([
                'product_code' => $this->productCode,
                'product_name' => $this->productName,
                'description' => $this->productDescription,
                'note' => $this->productNote,
                'updated_at' => Carbon::now(),
            ]);

        ProductCategory::where('product_id', $this->productId)
            ->update([
                'category_id' => $this->categoryId
            ]);

        $this->productNameRequired = false;
        session()->flash('message', 'Product updated!');

        $this->emit('reRenderParent');
    }

    public function render()
    {
        $categories = Category::orderBy('category_name', 'asc')
            ->select([
                'id AS categoryId',
                'category_name'
            ])->get();
        return view('livewire.mgs-inventory.stock-management.modal-update-stock', [
            'categories' => $categories,
        ]);
    }
}
