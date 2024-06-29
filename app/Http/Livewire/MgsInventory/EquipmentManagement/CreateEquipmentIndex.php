<?php

namespace App\Http\Livewire\MgsInventory\EquipmentManagement;


use App\Models\Inventory\Category;
use App\Models\Inventory\Equipment;
use App\Models\Inventory\EquipmentCategory;
use Livewire\Component;
use Illuminate\Support\Carbon;

class CreateEquipmentIndex extends Component
{
    public $newCategory = false;
    public $categoryName, $categoryNote;
    public $categoryId,
        $maker,
        $equipmentNo,
        $plateNo,
        $engineNo,
        $chassisNo,
        $equipmentDesc,
        $datePurchased,
        $equipmentNote;

    public $categoryIdRequired = false,
        $categoryNameRequired = false,
        $equipmentNoRequired = false;

    public function createNewCategory()
    {
        $this->newCategory = true;
        $this->reset('categoryId');
    }

    public function cancelNewCategory()
    {
        $this->newCategory = false;
        $this->reset('categoryName', 'categoryNote');
    }

    public function createEquipment()
    {
        if ($this->newCategory) {
            $this->saveCategoryAndEquipment();
        } else {
            $this->saveEquipment();
        }
    }
        
    public function saveCategoryAndEquipment()
    {
        if(empty($this->categoryName)) {
            $this->categoryNameRequired = true;
            
            return;
        }

        if(empty($this->equipmentNo)) {
            $this->equipmentNoRequired = true;
            
            return;
        }

        $lastInsertedCategoryId = $this->insertDataToCategories();
        $lastInsertedEquipmentId = $this->insertDataToEquipment();

        $this->insertDataToEquipmentCategories($lastInsertedEquipmentId, $lastInsertedCategoryId);

        $this->categoryNameRequired = false;
        $this->equipmentNoRequired = false;
        $this->categoryIdRequired = false;
        $this->newCategory = false;
        $this->reset(
            'categoryId',
            'categoryName',
            'categoryNote',
            'maker',
            'equipmentNo',
            'plateNo',
            'engineNo',
            'chassisNo',
            'equipmentDesc',
            'datePurchased',
            'equipmentNote'
        );

        session()->flash('message', 'Equipment created!');
    }

    public function saveEquipment() 
    {
        if(empty($this->categoryId)) {
            $this->categoryIdRequired = true;
            
            return;
        }

        if(empty($this->equipmentNo)) {
            $this->equipmentNoRequired = true;
            
            return;
        }

        $lastInsertedEquipmentId = $this->insertDataToEquipment();

        $this->insertDataToEquipmentCategories($lastInsertedEquipmentId, $this->categoryId);

        $this->categoryIdRequired = false;
        $this->equipmentNoRequired = false;
        $this->newCategory = false;
        $this->reset(
            'categoryId',
            'maker',
            'equipmentNo',
            'plateNo',
            'engineNo',
            'chassisNo',
            'equipmentDesc',
            'datePurchased',
            'equipmentNote'
        );

        session()->flash('message', 'Equipment created!');
    }
    
    public function render()
    {
        $categories = Category::orderBy('category_name', 'asc')
            ->select([
                'id AS categoryId',
                'category_name'
            ])
            ->get();
            
        return view('livewire.mgs-inventory.equipment-management.create-equipment-index', compact('categories'));
    }

    private function insertDataToCategories()
    {
        $category = Category::create([
            'category_name' => $this->categoryName,
            'note' => $this->categoryNote,
            'created_at' => Carbon::now()
        ]);

        return $category->id;
    }

    private function insertDataToEquipment()
    {
        $equipment = Equipment::create([
            'maker' => $this->maker,
            'equipment_no' => $this->equipmentNo,
            'plate_no' => $this->plateNo,
            'engine_no' => $this->engineNo,
            'chassis_no' => $this->chassisNo,
            'equipment_description' => $this->equipmentDesc,
            'date_purchased' => $this->datePurchased,
            'equipment_note' => $this->equipmentNote
        ]);

        return $equipment->id;
    }

    private function insertDataToEquipmentCategories($equipmentId, $categoryId)
    {
        EquipmentCategory::create([
            'category_id' => $categoryId,
            'equipment_id' => $equipmentId,
            'created_at' => Carbon::now()
        ]);
    }
}