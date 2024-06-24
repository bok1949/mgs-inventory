<?php

namespace App\Http\Livewire\MgsInventory\CategoryManagement;

use Livewire\Component;
use App\Models\Inventory\Category;

class UpdateCategoryIndex extends Component
{
    public $categoryId;
    
    public function render()
    {
        $category = Category::find($this->categoryId);
        // dd($category);
        return view('livewire.mgs-inventory.category-management.update-category-index', 
        ['category'=>$category]);
    }
}