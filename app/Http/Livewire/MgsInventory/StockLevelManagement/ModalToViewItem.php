<?php

namespace App\Http\Livewire\MgsInventory\StockLevelManagement;

use Livewire\Component;
use App\Models\Inventory\Items;

class ModalToViewItem extends Component
{
    protected $listeners = [
        'showModalToViewItem',
    ];

    public $productName;
    public $itemData;

    public function showModalToViewItem($itemId, $productName)
    {
        $this->productName = $productName;

        /* get the item data */
        $itemData = Items::where('items.id', $itemId);
        $itemData->select(
            'items.id AS itemId',
            'items.available',
            'items.defective',
            'items.unit_measurement',
            'items.price',
            'items.specification'
        );

        $itemData->join('brands', 'brands.id', '=', 'items.brand_id');
        $itemData->addSelect(
            'brands.brand_name'
        );
        $itemData->join('suppliers', 'suppliers.id', '=', 'items.supplier_id');
        $itemData->addSelect(
            'suppliers.supplier_name'
        );
        $this->itemData = $itemData->first();

       /*  $this->brand_id = $itemData->brand_id;
        $this->supplier_id = $itemData->supplier_id;
        $this->price = $itemData->price;
        $this->available = $itemData->available;
        $this->defective = $itemData->defective;
        $this->unit_measurement = $itemData->unit_measurement;
        $this->specification = $itemData->specification; */
    }
    public function render()
    {
        return view('livewire.mgs-inventory.stock-level-management.modal-to-view-item');
    }
}
