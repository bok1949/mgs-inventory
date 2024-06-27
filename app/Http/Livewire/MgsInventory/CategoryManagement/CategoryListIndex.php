<?php

namespace App\Http\Livewire\MgsInventory\CategoryManagement;
use App\Models\Inventory\Category;

use Livewire\Component;
use Livewire\WithPagination;

class CategoryListIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reRenderParent'];

    public $searchCategory;
    
    
    public function reRenderParent()
    {
        $this->render();
    }

    public function openModalToUpdateCategory($id) 
    {
        $this->emit('openModalToUpdateCategory', $id);
    }

    public function openModalToViewCategory($id) 
    {
        $this->emit('openModalToViewCategory', $id);
    }

    public function clearSearchInput() 
    {
        $this->reset('searchCategory');
    }

    public function render()
    {
        $allCategories = Category::orderBy('category_name', 'asc')
            ->select([
                'id AS categoryId',
                'category_name',
                'note'
            ]);

        /** search */
        if (!empty($this->searchCategory)) {
            $allCategories->orWhere('category_name', 'like', '%' . $this->searchCategory . '%');
        }

        $categories = $allCategories->paginate(25);
        
        return view('livewire.mgs-inventory.category-management.category-list-index', compact('categories'));
    }

}