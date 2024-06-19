<?php

namespace App\Http\Livewire\MgsInventory\StockManagement;

use Livewire\Component;
use App\Models\Inventory\Product;
use Livewire\WithPagination;

class StockList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $searchProduct;
    public $test="foobar";

    public function render()
    {
        $allProducts = Product::orderBy('product_name', 'asc')
            ->select(
                'product_id AS productId',
                'product_code',
                'product_name',
                'product_desription'
            );

        /** search */
        if (!empty($this->searchProduct)) {
            $allProducts->orWhere('product_name', 'like', '%' . $this->searchProduct . '%');
        }

        $products = $allProducts->paginate(2);

        return view('livewire.mgs-inventory.stock-management.stock-list', [
            'products' => $products
        ]);
    }
}
