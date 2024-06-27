<?php

namespace App\Http\Livewire\MgsInventory\SupplierManagement;
use App\Models\Inventory\Supplier;
use Livewire\WithPagination;


use Livewire\Component;

class SupplierList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $searchSupplier;
    protected $listeners = ['reRenderParent'];
    
    public function reRenderParent()
    {
        $this->render();
    }
    public function openModalToUpdateSupplier($id)
    {
        $this->emit('openModalToUpdateSupplier', $id);
    }
    public function render()
    {
        $allSuppliers = Supplier::query();

        if (!empty($this->searchSupplier)) {
            $allSuppliers->orWhere('supplier_name', 'like', '%' . $this->searchSupplier . '%');
        }

        $allSupp = $allSuppliers->paginate(5);
        return view('livewire.mgs-inventory.supplier-management.supplier-list',[
            'suppliers' => $allSupp,
        ]);
    }
}
