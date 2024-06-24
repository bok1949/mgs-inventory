<?php

namespace App\Http\Livewire\MgsInventory\CategoryManagement;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory\Category;

use Livewire\Component;

class CategoryListIndex extends Component
{
    
    public function editCategory($id)
    {
        $this->emit('showEditCategory', $id);
    }
    
    public function render()
    {
        $categories = Category::all();
        return view('livewire.mgs-inventory.category-management.category-list-index', compact('categories'));
    }

}