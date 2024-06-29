<?php

namespace App\Http\Livewire\MgsInventory\EquipmentManagement;

use Livewire\Component;
use App\Models\Inventory\Equipment;

class ModalViewEquipment extends Component
{
    protected $listeners = [
        'openModalToViewEquipment',
    ];
    
    public $equipmentId,
        $maker,
        $equipmentNo,
        $plateNo,
        $engineNo,
        $chassisNo,
        $equipmentDesc,
        $datePurchased,
        $equipmentNote,
        $categoryName;

    public function openModalToViewEquipment($equipmentId)
    {
        $equipment = Equipment::where('equipments.id', $equipmentId);
        $equipment->join('equipment_categories', 'equipment_categories.equipment_id', '=', 'equipments.id');
        $equipment->join('categories', 'categories.id', '=', 'equipment_categories.category_id');
        $equipment->select([
            'equipments.maker',
            'equipments.equipment_no',
            'equipments.plate_no',
            'equipments.engine_no',
            'equipments.chassis_no',
            'equipments.equipment_description',
            'equipments.date_purchased',
            'equipments.equipment_note',
            'categories.category_name'
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
        $this->categoryName = $fetchedData->category_name;
    }
        
    public function render()
    {
        return view('livewire.mgs-inventory.equipment-management.modal-view-equipment');
    }
}