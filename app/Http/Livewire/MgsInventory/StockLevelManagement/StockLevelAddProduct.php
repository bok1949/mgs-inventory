<?php

namespace App\Http\Livewire\MgsInventory\StockLevelManagement;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Inventory\Brand;
use App\Models\Inventory\Items;
use App\Models\Inventory\Product;
use App\Models\Inventory\Supplier;
use Illuminate\Support\Facades\DB;

class StockLevelAddProduct extends Component
{
    protected $rules = [
        'brand_name' => 'required|min:2|max:255',
    ];

    public $searchProduct;
    public $toggleToShowItem = false, 
        $showCreateButton = false,
        $showCreateNewBrandInput = false,
        $showCreateNewSupplierInput = false;
    public $productLevelItems = [], $dataToSave = [];
    public $suppliers = null, $brands = null;

    public $selectedSupplierIds = [],
        $selectedBrandIds = [],
        $availableStockValues = [],
        $defectiveStockValues = [],
        $selectedUnitMeasurements = [],
        $priceValues = [],
        $specificationValues = [];
    /* create brand */
    public $brand_name, $note;
    
    /* create supplier */
    public $supplier_name, $address, $phone_number, $landline;
    
    public function toggleItem()
    {
        $this->toggleToShowItem = $this->toggleToShowItem === false
            ? true
            : false;
    }

    public function selectProduct($productId, $productName, $productCode)
    {
        $data = [
            'product_id' => $productId,
            'product_code' => $productCode,
            'product_name' => $productName,
        ];

        $this->productLevelItems[] = $data;

        $this->toggleItem();
    }

    /* reset item selection */
    public function cancelItemSelection()
    {
        $this->productLevelItems = [];
        $this->selectedSupplierIds = [];
        $this->selectedBrandIds = [];
        $this->availableStockValues = [];
        $this->defectiveStockValues = [];
        $this->selectedUnitMeasurements = [];
        $this->priceValues = [];
        $this->specificationValues = [];
    }

    public function removeProductFromSelectionList($arrayKey)
    {
        if ($arrayKey) {
            unset($this->productLevelItems[$arrayKey]);
        }
    }

    /* save selected items in the database */
    public function saveChanges()
    {
        foreach ($this->productLevelItems as $key => $productLevelItem) {
            $this->dataToSave[$key] = [
                'brand_id' => $this->selectedBrandIds[$key] ?? null,
                'supplier_id' => $this->selectedSupplierIds[$key] ?? null,
                'product_id' => $productLevelItem['product_id'],
                'item_qrcode' => Str::uuid()->toString(),
                'price' => $this->priceValues[$key] ?? null,
                'available' => $this->availableStockValues[$key] ?? null,
                'defective' => $this->defectiveStockValues[$key] ?? null,
                'unit_measurement' => $this->selectedUnitMeasurements[$key] ?? null,
                'specification' => $this->specificationValues[$key] ?? null,
            ];
        }

        /* insert data into DB */
        try {
            DB::table('items')->insert($this->dataToSave);
            session()->flash('success', 'Items successfully created!');
            $this->dispatchBrowserEvent('create-success');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatchBrowserEvent('error-adding-items', ['message' => $th]);
        }
        $this->cancelItemSelection();

    }

    /* saving brand in the database */
    public function saveBrandInStockLevelCreate()
    {
        $validatedData = $this->validate();
        $validatedData = array_merge($validatedData, ['created_at' => Carbon::now()]);
        
        try {
            Brand::create($validatedData);
            session()->flash('success-message', 'Brand is created!');
            $this->dispatchBrowserEvent('create-success');
            
            $this->reset(
                'brand_name',
                'note'
            );
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatchBrowserEvent('create-error', ['error_message' => 'Something went wrong! ' . $th]);
        }
    }

    /* saving supplier in the database */
    public function saveSupplierInStockLevelCreate()
    {
        if (!$this->supplier_name) {
            session()->flash('supplier-name-error', 'Supplier name is required!');
        } elseif ($this->phone_number && strlen($this->phone_number) !== 11) {
            session()->flash('phone-number-error', 'Phone number must be 11 characters!');
        } else {
            $data = [
                'supplier_name' => $this->supplier_name,
                'address' => $this->address,
                'phone_number' => $this->phone_number,
                'landline' => $this->landline,
                'created_at' => Carbon::now()
            ];
    
            try {
                Supplier::create($data);
                session()->flash('success-message', 'Supplier is created!');
                $this->dispatchBrowserEvent('create-success');
                
                $this->reset(
                    'supplier_name',
                    'address',
                    'phone_number',
                    'landline'
                );
            } catch (\Throwable $th) {
                //throw $th;
                $this->dispatchBrowserEvent('create-error', ['error_message' => 'Something went wrong! ' . $th]);
            }
        }
    }

    public function createNewBrandOrSupplier($new)
    {
        if ($new === "brand") {
            $this->showCreateNewBrandInput = true;
            $this->showCreateNewSupplierInput = false;
        } elseif ($new === "supplier") {
            $this->showCreateNewSupplierInput = true;
            $this->showCreateNewBrandInput = false;
        }
        $this->resetCreateBrandOrSupplier();
    }

    public function cancelCreateNewBrandOrSupplier($new)
    {
        if ($new === "brand") {
            $this->showCreateNewBrandInput = false;
        } elseif ($new === "supplier") {
            $this->showCreateNewSupplierInput = false;
        }
        $this->resetCreateBrandOrSupplier();
    }

    public function render()
    {
        if ((count($this->selectedBrandIds) > 0 && count($this->selectedSupplierIds) > 0) &&
            count($this->selectedBrandIds) === count($this->productLevelItems) &&
            count($this->selectedSupplierIds) === count($this->productLevelItems)) {
            $this->showCreateButton = true;
        } else {
            $this->showCreateButton = false;
        }
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

        $allProduct = Product::orderBy('product_name', 'asc')
            ->select(
                'products.id AS productId',
                'product_code',
                'product_name'
            );
        
        if ($this->searchProduct) {
            $allProduct->where('product_name', 'LIKE', '%' . $this->searchProduct . '%')
                ->orWhere('product_code', 'LIKE', '%' . $this->searchProduct . '%');
        }
        
        $products = $allProduct->get();

        return view('livewire.mgs-inventory.stock-level-management.stock-level-add-product', compact(
            'products',
        ));
    }

    private function resetCreateBrandOrSupplier()
    {
        $this->reset(
            'brand_name',
            'note',
            'supplier_name',
            'address',
            'phone_number',
            'landline'
        );
        $this->resetValidation();
    }

}
