<?php

namespace App\Http\Livewire\MgsInventory\SupplierManagement;

use App\Models\Inventory\Supplier;
use Illuminate\Support\Carbon;

use Livewire\Component;

class ModalUpdateSupplier extends Component
{
    protected $listeners = [
        'openModalToUpdateSupplier',
    ];
    public $suppName,
        $address,
        $phoneNum,
        $telNum,
        $supplier,
        $suppID;
    public function openModalToUpdateSupplier ($supplierID)
    {
        $this->supplier = Supplier::find($supplierID);
        // dd($supplier);
        $this->suppName = $this->supplier->supplier_name;
        $this->address = $this->supplier->address;
        $this->phoneNum = $this->supplier->phone_number;
        $this->telNum = $this->supplier->landline;
        $this->suppID = $this->supplier->id;

    }
    public function updateSupplierInfo (){
       $supplierUpdated = Supplier::where('id',  $this->suppID)
            ->update([
                'supplier_name' => $this->suppName,
                'address' => $this->address,
                'phone_number' => $this->phoneNum,
                'landline' => $this->suppID,
                'updated_at' => Carbon::now(),
            ]);

           if ($supplierUpdated) {
            session()->flash('message', 'Supplier information updated!');
           }
    }
    public function render()
    {
        return view('livewire.mgs-inventory.supplier-management.modal-update-supplier');
    }
}
