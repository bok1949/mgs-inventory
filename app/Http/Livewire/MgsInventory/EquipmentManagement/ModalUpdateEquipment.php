<?php

namespace App\Http\Livewire\MgsInventory\EquipmentManagement;

use App\Models\Inventory\Equipment;
use App\Models\Inventory\Category;
use App\Models\Inventory\EquipmentCategory;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ModalUpdateEquipment extends Component
{
    protected $listeners = [
        'openModalToUpdateEquipment',
    ];

    public $equipmentId,
        $maker,
        $equipmentNo,
        $plateNo,
        $engineNo,
        $chassisNo,
        $equipmentDesc,
        $datePurchased,
        $equipmentNote;
    
    public $categoryId;
    
    public $equipmentNoRequired = false;

    public function openModalToUpdateEquipment($equipmentId)
    {
        $equipment = Equipment::where('equipments.id', $equipmentId);
        $equipment->join('equipment_categories', 'equipment_categories.equipment_id', '=', 'equipments.id');
        $equipment->select([
            'equipments.maker',
            'equipments.equipment_no',
            'equipments.plate_no',
            'equipments.engine_no',
            'equipments.chassis_no',
            'equipments.equipment_description',
            'equipments.date_purchased',
            'equipments.equipment_note',
            'equipment_categories.category_id'
        ]);

        $fetchedData = $equipment->first();

        $this->equipmentId = $equipmentId;
        $this->maker = $fetchedData->maker;
        $this->equipmentNo = $fetchedData->equipment_no;
        $this->plateNo = $fetchedData->plate_no;
        $this->engineNo = $fetchedData->engine_no;
        $this->chassisNo = $fetchedData->chassis_no;
        $this->equipmentDesc = $fetchedData->equipment_description;
        $this->datePurchased = $fetchedData->date_purchased;
        $this->equipmentNote = $fetchedData->equipment_note;
        $this->categoryId = $fetchedData->category_id;
    }

    public function saveChanges()
    {
        if (empty($this->equipmentNo)) {
            $this->equipmentNoRequired = true;

            return;
        }

        Equipment::where('equipments.id',  $this->equipmentId)
            ->update([
                'maker' => $this->maker,
                'equipment_no' => $this->equipmentNo,
                'plate_no' => $this->plateNo,
                'engine_no' => $this->engineNo,
                'chassis_no' => $this->chassisNo,
                'equipment_description' => $this->equipmentDesc,
                'date_purchased' => $this->datePurchased,
                'equipment_note' => $this->equipmentNote,
                'updated_at' => Carbon::now(),
            ]);

        EquipmentCategory::where('equipment_id', $this->equipmentId)
            ->update([
                'category_id' => $this->categoryId
            ]);

        $this->equipmentNoRequired = false;
        session()->flash('message', 'Equipment updated!');

        $this->emit('reRenderParent');
    }
    
    public function render()
    {
        $categories = Category::orderBy('category_name', 'asc')
            ->select([
                'id AS categoryId',
                'category_name'
            ])->get();
        return view('livewire.mgs-inventory.equipment-management.modal-update-equipment', [
            'categories' => $categories
        ]);
    }
}