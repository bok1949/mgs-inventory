<?php

namespace App\Http\Livewire\MgsInventory\EquipmentManagement;

use App\Models\Inventory\Category;
use App\Models\Inventory\Equipment;
use Livewire\Component;
use Livewire\WithPagination;

class EquipmentListIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reRenderParent'];

    public $searchEquipmentNo;
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
     * this will emit model ModalCreateEquipment and show the modal
     */ 
    public function openCreateEquipmentModal()
    {
        $this->emit('openModalToCreateEquipment');
    }

    /**
     * this will emit model ModalUpdateEquipment and show the modal
     */
    public function openModalToUpdateEquipment($id)
    {
        $this->emit('openModalToUpdateEquipment', $id);
    }

    /**
     * this will emit model ModalViewEquipment and show the modal
     */
    public function openModalToViewEquipment($id)
    {
        $this->emit('openModalToViewEquipment', $id);
    }
    
    public function render()
    {

        $allEquipments = Equipment::orderBy('maker', 'asc')
        ->select(
            'equipments.id AS equipmentId',
            'maker',
            'equipment_no',
            'plate_no',
            'engine_no',
            'chassis_no',
            'equipment_description',
            'date_purchased',
            'equipment_note',
        );

        $categories = Category::orderBy('category_name', 'asc')
            ->select([
                'categories.id AS categoryId',
                'category_name'
            ])->get();

        /** search */
        if (!empty($this->searchEquipmentNo)) {
            $allEquipments->orWhere('equipment_no', 'like', '%' . $this->searchEquipmentNo . '%');
        }

        if (!empty($this->filterByCategory)) {
            $allEquipments->join('equipment_categories', 'equipment_categories.equipment_id', '=', 'equipments.id');
            $allEquipments->where('equipment_categories.category_id', '=', $this->filterByCategory);
            $this->filteredCategoryName = Category::select('categories.category_name')->where('categories.id', '=', $this->filterByCategory)->first();
        }

        $equipments = $allEquipments->paginate(25);
            
        return view('livewire.mgs-inventory.equipment-management.equipment-list-index', [
            'equipments' => $equipments,
            'categories' => $categories
        ]);
    }
}