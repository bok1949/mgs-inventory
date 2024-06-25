<?php

namespace App\Http\Livewire\MgsInventory\SupplierManagement;

use App\Models\Inventory\Supplier;
use Illuminate\Support\Carbon;
use Livewire\Component;

class CreateSupplier extends Component
{
    public $supplierName, $address, $cpNumber, $landlineNumber;
    //data validation
    protected $rules = [
        'supplierName' => 'required|min:2|max:100',
        'address' => 'required|min:8|max:100',
        'cpNumber' => 'required',
        'landlineNumber' => 'required',
    ];
    //custom error message
    public function messages()
    {
        return [
            'address.required' => 'The address field is required.',
            'address.min' => 'The address must be at least :min characters.',
            'address.max' => 'The address may not be greater than :max characters.',
        ];
    }

    public function render()
    {
        return view('livewire.mgs-inventory.supplier-management.create-supplier');
    }

    public function addSupplier()
    {
        $validatedData = $this->validate();

        $supplier = new Supplier();
        $supplier->supplier_name = $validatedData['supplierName'];
        $supplier->address = $validatedData['address'];
        $supplier->phone_number = $validatedData['cpNumber'];
        $supplier->landline = $validatedData['landlineNumber'];
        $supplier->created_at = Carbon::now();

        if ($supplier->save()) {
            session()->flash('success', 'Supplier added successfully!');
            session()->flash('success_expires_at', now()->addSeconds(3));
        } else {
            session()->flash('fail', 'Failed to save supplier information!');
            session()->flash('danger_expires_at', now()->addSeconds(3));
        }

        return redirect()->back();
    }
}
