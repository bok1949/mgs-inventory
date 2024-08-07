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
        'cpNumber' => 'required_if:landlineNumber,null|digits:11|numeric',//mejju buggy dytoy, kitak to nu adda maymayt ikasta, ag bug nu min max mausar
        'landlineNumber' => 'required_if:cpNumber,null|numeric',
    ];
    //custom error message
    public function messages()
    {
        return [
            'supplierName.required' => 'The supplier name field is required.',
            'supplierName.min' => 'The supplier name must be at least :min characters.',
            'supplierName.max' => 'The supplier name may not be greater than :max characters.',

            'address.required' => 'The address field is required.',
            'address.min' => 'The address must be at least :min characters.',
            'address.max' => 'The address may not be greater than :max characters.',
            
            'cpNumber.required_if' => 'The phone number field is required when landline number is not provided.',
            'landlineNumber.required_if' => 'The landline number field is required when phone number is not provided.',
            'cpNumber.digits' => 'This field must not exceed :digits characters and must contain numbers only.',
            // 'cpNumber.max' => 'The phone number exceeded :max characters.',
            'cpNumber.numeric' => 'Only numbers allowed',
            'landlineNumber.numeric' => 'Only numbers allowed',
            // 'landlineNumber.min' => 'The landline number must be at least :min characters.',

        ];
    }

    public function render()
    {
        return view('livewire.mgs-inventory.supplier-management.create-supplier');
    }

    public function addSupplier()
    {
        $validatedData = $this->validate();
        $existingSupplier = Supplier::where('supplier_name', $validatedData['supplierName'])->first();
        
        if ($existingSupplier) {
            session()->flash('fail', 'Supplier with the same name already exists!');
            session()->flash('danger_expires_at', now()->addSeconds(3));
            return redirect()->back();
        } else { 
            
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
            $this->supplierName = '';
            $this->address = '';
            $this->cpNumber = null;
            $this->landlineNumber = null;
            return redirect()->back();
        }
    }
}
