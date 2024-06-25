<?php

namespace App\Http\Livewire\MgsInventory\SupplierManagement;
use App\Models\Inventory\Supplier;
use Livewire\WithPagination;


use Livewire\Component;

class SupplierList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $allSuppliers = Supplier::paginate(5);

        return view('livewire.mgs-inventory.supplier-management.supplier-list',[
            'suppliers' => $allSuppliers,
        ]);
    }
}
