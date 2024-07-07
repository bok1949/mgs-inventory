<?php

namespace App\Http\Livewire\MgsInventory\StockLevelManagement;

use Livewire\Component;

class ModalToViewItemHistory extends Component
{
    protected $listeners = [
        'showModalToViewHistory',
    ];

    public $itemId, $productName;

    public function showModalToViewHistory($itemId, $productName)
    {
        $this->itemId = $itemId;
        $this->productName = $productName;
    }

    public function render()
    {
        return view('livewire.mgs-inventory.stock-level-management.modal-to-view-item-history');
    }
}
