<?php

namespace App\Http\Livewire\MgsInventory\StockLevelManagement;

use Livewire\Component;
use App\Models\Inventory\Brand;
use App\Models\Inventory\Product;
use App\Models\Inventory\Supplier;

class StockLevelIndex extends Component
{
    protected $listeners = ['reRenderParent'];

    public $searchItem, $filterBySupplier, $filterByBrand;
    public $filteredSupplierName, $filteredBrandName;

    public function openModalToViewItem($itemId, $productName)
    {
        $this->emit('showModalToViewItem', $itemId, $productName);
    }

    public function openModalToEditItem($itemId, $productName)
    {
        $this->emit('showModalToEditItem',$itemId, $productName);
    }
    
    public function openModalToViewHistory($itemId, $productName)
    {
        $this->emit('showModalToViewHistory', $itemId, $productName);
    }

    public function openModalToConfirmItemDeletion($itemId, $productName)
    {
        $this->emit('showModalToConfirmDeletion',$itemId, $productName);
    }

    public function reRenderParent()
    {
        $this->render();
    }

    public function clearFilter()
    {
        $this->reset();
    }

    public function render()
    {
        $allProducts = Product::orderBy('product_name', 'asc')
            ->select(
                'products.id AS productId',
                'products.product_code',
                'products.product_name',
            );
        $allProducts->join('items', 'items.product_id', '=', 'products.id');
        $allProducts->addSelect(
            'items.id AS itemId',
            'items.available',
            'items.defective',
            'items.unit_measurement',
            'items.price'
        );
        $allProducts->join('brands', 'brands.id', '=', 'items.brand_id');
        $allProducts->addSelect(
            'brands.brand_name'
        );
        $allProducts->join('suppliers', 'suppliers.id', '=', 'items.supplier_id');
        $allProducts->addSelect(
            'suppliers.supplier_name'
        );

        /** search */
        if (!empty($this->searchItem)) {
            $allProducts->where('products.product_name', 'like', '%' . $this->searchItem . '%');
            $allProducts->orWhere('suppliers.supplier_name', 'like', '%' . $this->searchItem . '%');
            $allProducts->orWhere('brands.brand_name', 'like', '%' . $this->searchItem . '%');
        }
        
        /** filters */
        if (!empty($this->filterBySupplier)) {
            if (!empty($this->searchItem)) {
                $this->reset('searchItem');
            } 
            $allProducts->where('suppliers.id', '=', $this->filterBySupplier);
            
            $this->filteredSupplierName = Supplier::select('supplier_name')->where('id', '=', $this->filterBySupplier)->first();
        }

        if (!empty($this->filterByBrand)) {
            if (!empty($this->searchItem)) {
                $this->reset('searchItem');
            } 
            $allProducts->where('brands.id', '=', $this->filterByBrand);
            
            $this->filteredBrandName = Brand::select('brand_name')->where('id', '=', $this->filterByBrand)->first();
        }

        $suppliers = Supplier::orderBy('supplier_name')
            ->select(
                'id AS supplier_id',
                'supplier_name'
            )
            ->get();

        $brands = Brand::orderBy('brand_name')
            ->select(
                'id AS brand_id',
                'brand_name'
            )
            ->get();


        $productItems = $allProducts->paginate(25);

        return view('livewire.mgs-inventory.stock-level-management.stock-level-index', 
            compact(
                'productItems',
                'suppliers',
                'brands'
            )
        );
    }
}
