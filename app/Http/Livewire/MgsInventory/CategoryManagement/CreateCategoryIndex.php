<?php

namespace App\Http\Livewire\MgsInventory\CategoryManagement;

use App\Models\Inventory\Category;
use Illuminate\Support\Carbon;
use Livewire\Component;

class CreateCategoryIndex extends Component
{
    public $categoryName, $categoryNote;

    public $categoryNameRequired = false;

    public function createCategory ()
    { 
        if (empty($this->categoryName)) {
            $this->categoryNameRequired = true;

            return;
        }

        $category = Category::create([
            'category_name' => $this->categoryName,
            'note' => $this->categoryNote,
            'created_at' => Carbon::now()
        ]);

        $this->categoryNameRequired = false;
        $this->reset('categoryName', 'categoryNote');
        
        session()->flash('message', 'Category created!');
    }
    
    public function render()
    {
        return view('livewire.mgs-inventory.category-management.create-category-index');
    }
}