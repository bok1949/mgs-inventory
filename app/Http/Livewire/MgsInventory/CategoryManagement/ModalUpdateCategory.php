<?php

namespace App\Http\Livewire\MgsInventory\CategoryManagement;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\Inventory\Category;

class ModalUpdateCategory extends Component
{
    protected $listeners = [
        'openModalToUpdateCategory',
    ];

    public $categoryId,
        $categoryName,
        $categoryNote;

    public $categoryNameRequired = false;
    
    public function openModalToUpdateCategory($categoryId)
    {
        $category = Category::where('id', '=', $categoryId);
        
        $fetchedData = $category->first();

        $this->categoryId = $categoryId;
        $this->categoryName = $fetchedData->category_name;
        $this->categoryNote = $fetchedData->note;

    }

    public function saveChanges()
    {
        if (empty($this->categoryName)) {
            $this->categoryNameRequired = true;

            return;
        }

        Category::where('id', $this->categoryId)
            ->update([
                'category_name' => $this->categoryName,
                'note' => $this->categoryNote,
                'updated_at' => Carbon::now()
            ]);
            
        $this->categoryNameRequired = false;
        session()->flash('message', 'Category updated!');

        $this->emit('reRenderParent');
    }

    public function render()
    {
        $categories = Category::orderBy('category_name', 'asc')
            ->select([
                'id AS categoryId',
                'category_name'
            ])->get();
            
        return view('livewire.mgs-inventory.category-management.modal-update-category', [
            'categories' => $categories,
        ]);
    }
}