<?php

namespace App\Http\Livewire\MgsInventory\StockManagement;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Inventory\Product;
use App\Models\Inventory\Category;

class StockList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reRenderParent'];

    public $searchProduct;
    public $filterByCategory, $filteredCategoryName;

    public function clearFilter()
    {
        $this->reset('filterByCategory', 'filteredCategoryName');
    }

    public function reRenderParent()
    {
        $this->render();
    }

    /**
     * this will emit model ModalCreateStock and show the modal
     * to add Stock/Product
     */
    public function openCreateStockModal()
    {
        $this->emit('openModalToCreateStock');
    }

    /**
     * this will emit model ModalUpdateStock and show the modal
     * to update Stock/Product
     */
    public function openModalToUpdateStock($id)
    {
        $this->emit('openModalToUpdateStock', $id);
    }

    /**
     * this will emit model ModalViewStock and show the modal
     * to view Stock/Product
     */
    public function openModalToViewStock($id)
    {
        $this->emit('openModalToViewStock', $id);
    }

    public function render()
    {
        $allProducts = Product::orderBy('product_name', 'asc')
            ->select(
                'id AS productId',
                'product_code',
                'product_name',
                'description'
            );

        $categories = Category::orderBy('category_name', 'asc')
            ->select([
                'id AS categoryId',
                'category_name'
            ])->get();

        /** search */
        if (!empty($this->searchProduct)) {
            $allProducts->orWhere('product_name', 'like', '%' . $this->searchProduct . '%');
        }

        if (!empty($this->filterByCategory)) {
            $allProducts->join('product_categories', 'product_categories.product_id', '=', 'products.id');
            $allProducts->where('product_categories.product_id', '=', $this->filterByCategory);
            $this->filteredCategoryName = Category::select('category_name')->where('id', '=', $this->filterByCategory)->first();
        }

        $products = $allProducts->paginate(25);

        return view('livewire.mgs-inventory.stock-management.stock-list', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
