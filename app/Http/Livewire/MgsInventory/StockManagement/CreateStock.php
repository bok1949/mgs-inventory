<?php

namespace App\Http\Livewire\MgsInventory\StockManagement;

use Livewire\Component;
use App\Models\Inventory\Category;
use App\Models\Inventory\Product;
use Illuminate\Support\Carbon;
use App\Models\Inventory\ProductCategory;

class CreateStock extends Component
{
    public $newCategory = false;
    public $categoryName, $categoryNote;
    public $categoryId;
    public $productCode, $productName, $productDescription, $productNote;
    public $categoryIdRequired = false, 
        $productNameRequired = false, 
        $categoryNameRequired = false;

    public function createNewCategory()
    {
        $this->newCategory = true;
        $this->reset('categoryId');
    }

    public function cancelNewCategory()
    {
        $this->newCategory = false;
        $this->reset('categoryName', 'categoryNote');
    }

    public function createProduct()
    {
        if ($this->newCategory) {
            $this->saveCategoryAndProduct();
        } else {
            $this->saveProduct();
        }
    }

    public function saveCategoryAndProduct()
    {
        if (empty($this->categoryName) && empty($this->productName)) {
            $this->categoryNameRequired = true;
            $this->productNameRequired = true;

            return;
        }

        $lastInsertedCategoryId = $this->insertDataToCategories();
        $lastInsertedProductId = $this->insertDataToProduct();

        $this->insertDataToProductCategories($lastInsertedProductId, $lastInsertedCategoryId);

        $this->categoryNameRequired = false;
        $this->productNameRequired = false;
        $this->categoryIdRequired = false;
        $this->newCategory = false;
        $this->reset(
            'categoryId',
            'categoryName',
            'categoryNote',
            'productCode',
            'productName',
            'productDescription',
            'productNote'
        );

        session()->flash('message', 'Product created!');
    }

    public function saveProduct()
    {
        if (empty($this->categoryId)) {
            $this->categoryIdRequired = true;

            return;
        }

        if (empty($this->productName)) {
            $this->productNameRequired = true;

            return;
        }

        $lastInsertedProductId = $this->insertDataToProduct();

        $this->insertDataToProductCategories($lastInsertedProductId, $this->categoryId);
        
        $this->categoryIdRequired = false;
        $this->productNameRequired = false;
        $this->newCategory = false;
        $this->reset(
            'categoryId',
            'productCode',
            'productName',
            'productDescription',
            'productNote'
        );

        session()->flash('message', 'Product created!');
    }

    public function render()
    {
        $categories = Category::orderBy('category_name', 'asc')
            ->select([
                'id AS categoryId',
                'category_name'
            ])
            ->get();

        return view('livewire.mgs-inventory.stock-management.create-stock', compact('categories'));
    }

    private function insertDataToProduct()
    {
        $product = Product::create([
            'product_code' => $this->productCode,
            'product_name' => $this->productName,
            'description' => $this->productDescription,
            'note' => $this->productNote,
            'created_at' => Carbon::now()
        ]);

        return $product->id;
    }

    private function insertDataToCategories()
    {
        $category = Category::create([
            'category_name' => $this->categoryName,
            'note' => $this->categoryNote,
            'created_at' => Carbon::now()
        ]);

        return $category->id;
    }

    private function insertDataToProductCategories($productId, $categoryId)
    {
        ProductCategory::create([
            'category_id' => $categoryId,
            'product_id' => $productId,
            'created_at' => Carbon::now()
        ]);
    }
}