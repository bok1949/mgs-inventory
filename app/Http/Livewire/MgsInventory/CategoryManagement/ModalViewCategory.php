<?php

namespace App\Http\Livewire\MgsInventory\CategoryManagement;

use Livewire\Component;
use App\Models\Inventory\Category;

class ModalViewCategory extends Component
{
    protected $listeners = [
        'openModalToViewCategory',
    ];

    public $categoryName,
        $categoryNote;

    public function openModalToViewCategory($categoryId)
    {
        $category = Category::where('categories.id', $categoryId);

        $fetchedData = $category->first();

        $this->categoryName = $fetchedData->category_name;
        $this->categoryNote = $fetchedData->note;
    }

    public function render()
    {
        return view('livewire.mgs-inventory.category-management.modal-view-category');
    }
}