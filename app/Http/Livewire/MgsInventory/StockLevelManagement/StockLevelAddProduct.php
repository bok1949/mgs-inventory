<?php

namespace App\Http\Livewire\MgsInventory\StockLevelManagement;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Inventory\Brand;
use App\Models\Inventory\Product;
use App\Models\Inventory\Supplier;

class StockLevelAddProduct extends Component
{

    public $searchProduct;
    public $toggleToShowItem = false;
    public $productLevelItems = [];
    public $suppliers = null, $brands = null;

    public $dataIndexes = [];
    public $selectedSupplierId = [],
        $selectedBrandId = [],
        $availableStockValue = [],
        $defectiveStockValue = [],
        $selectedUnitMeasurement = [];
    
    public $dataItem = [];

    public function toggleItem()
    {
        $this->toggleToShowItem = $this->toggleToShowItem === false
            ? true
            : false;
    }

    public function selectProduct($productId, $productName, $productCode)
    {
        /* dump($productId);
        dump($productName);
        dump($productCode); */
        $data = [
            'product_id' => $productId,
            'product_name' => $productName,
            'product_code' => $productCode,
        ];

        // dump($data);

        $this->productLevelItems[] = $data;
        $this->dataIndexes = array_keys($this->productLevelItems);

        // $this->productLevelItems = collect($this->productLevelItems);
        $this->toggleItem();
    }

    public function render()
    {
        $this->suppliers = Supplier::orderBy('supplier_name', 'asc')
            ->select(
                'id AS supplierId',
                'supplier_name'
            )->get();

        $this->brands = Brand::orderBy('brand_name', 'asc')
            ->select(
                'id AS brandId',
                'brand_name'
            )->get();

        $allProduct = Product::orderBy('product_name', 'asc')
            ->select(
                'products.id AS productId',
                'product_code',
                'product_name'
            );
        
        if ($this->searchProduct) {
            $allProduct->where('product_name', 'LIKE', '%' . $this->searchProduct . '%')
                ->orWhere('product_code', 'LIKE', '%' . $this->searchProduct . '%');
        }
        
        $products = $allProduct->get();

        return view('livewire.mgs-inventory.stock-level-management.stock-level-add-product', compact(
            'products',
        ));
    }
}
