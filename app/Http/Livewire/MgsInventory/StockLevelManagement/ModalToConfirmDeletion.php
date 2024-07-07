<?php

namespace App\Http\Livewire\MgsInventory\StockLevelManagement;

use Livewire\Component;
use App\Models\Inventory\Items;

class ModalToConfirmDeletion extends Component
{
    protected $listeners = [
        'showModalToConfirmDeletion',
    ];

    public $itemId, $productName, $itemData;

    public function showModalToConfirmDeletion($itemId, $productName)
    {
        $this->itemId = $itemId;
        $this->productName = $productName;

        $itemData = Items::where('id', $itemId);
        $itemData->select(
            'available',
            'defective',
            'unit_measurement',
            'price',
            'specification'
        );

        $this->itemData = $itemData->first();
    }

    public function continueDeletion()
    {
        try {
            Items::where('id', $this->itemId)->delete();
            $this->dispatchBrowserEvent('success-deletion', ['deleteMessage' => 'Item is successfully deleted!']);
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatchBrowserEvent('create-error', ['error_message' => 'Something went wrong! ' . $th]);
        }

        $this->emit('reRenderParent');
    }

    public function render()
    {
        return view('livewire.mgs-inventory.stock-level-management.modal-to-confirm-deletion');
    }
}
