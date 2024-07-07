<?php

namespace App\Http\Livewire\MgsInventory\StockLevelManagement;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\Inventory\Brand;
use App\Models\Inventory\Items;
use App\Models\Inventory\Supplier;

use function Laravel\Prompts\alert;

class ModalToEditItem extends Component
{
    protected $listeners = [
        'showModalToEditItem',
    ];

    public $suppliers, $brands;
    public $itemId, $productName;
    public $brand_id, $supplier_id, 
        $price, $quantity, 
        $available, $defective, 
        $unit_measurement, $specification;

    public function showModalToEditItem($itemId, $productName)
    {
        $this->itemId = $itemId;
        $this->productName = $productName;
        
        /* get the item data */
        $itemData = Items::where('id', $itemId)->first();

        $this->brand_id = $itemData->brand_id;
        $this->supplier_id = $itemData->supplier_id;
        $this->price = $itemData->price;
        $this->available = $itemData->available;
        $this->defective = $itemData->defective;
        $this->unit_measurement = $itemData->unit_measurement;
        $this->specification = $itemData->specification;
    }

    /* submit data edited and save to db */
    public function saveItemEditedData()
    {
        try {
            Items::where('id',  $this->itemId)
            ->update([
                'brand_id' => $this->brand_id,
                'supplier_id' => $this->supplier_id,
                'price' => $this->price,
                'available' => $this->available,
                'defective' => $this->defective,
                'unit_measurement' => $this->unit_measurement,
                'specification' => $this->specification,
                'updated_at' => Carbon::now(),
            ]);

            session()->flash('message', 'Item updated successfully!');

            $this->emit('reRenderParent');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatchBrowserEvent('create-error', ['error_message' => 'Something went wrong! ' . $th]);
        }
    }

    public function render()
    {
        $this->suppliers = Supplier::orderBy('supplier_name', 'asc')
            ->select(
                'id AS supplierId',
                'supplier_name'
            )->get();

        $this->brands = Brand::orderBy('brand_name', 'asc')
            ->select(
                'id AS brandId',
                'brand_name'
            )->get();

        return view('livewire.mgs-inventory.stock-level-management.modal-to-edit-item');
    }
}
