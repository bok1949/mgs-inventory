@if ($newCategory)
<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="product_code" class="col-form-label">Category name</label>
    </div>
    <div class="col-md-8">
        <input type="text" class="form-control {{$categoryNameRequired ? 'is-invalid' : ''}}" wire:model="categoryName">
        @if ($productNameRequired)
        <div class="invalid-feedback">
            Category name is required.
        </div>
        @endif
    </div>
</div>
<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="product_code" class="col-form-label">Category Note</label>
    </div>
    <div class="col-md-8">
        <textarea class="form-control" wire:model="categoryNote" rows="3"></textarea>
    </div>
</div>

<div class="row align-items-center my-2">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <small class="text-muted float-end">
                    <a href="#" wire:click="cancelNewCategory">Cancel</a>
                    Creating new Category
                </small>
            </div>
        </div>
    </div>
</div>
<hr>
@else
<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="product_code" class="col-form-label">
            Category
            <small>
                <i class="bi bi-asterisk text-danger"></i>
            </small>
        </label>
    </div>
    <div class="col-md-8">
        <select class="form-select {{$categoryIdRequired ? 'is-invalid' : ''}}" wire:model="categoryId">
            <option selected>Select category...</option>
            @forelse ($categories as $category)
            <option value="{{$category->categoryId}}">{{ $category->category_name }}</option>
            @empty
            <option class="text-warning">
                No categories availabel yet...
            </option>
            @endforelse
        </select>
        @if ($categoryIdRequired)
        <div class="invalid-feedback">
            Please select a valid category.
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <small class="text-muted float-center">
            Category is not available?
            <a href="#" wire:click="createNewCategory">Create new</a>
        </small>
    </div>
</div>
@endif

<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="product_code" class="col-form-label">Product code</label>
    </div>
    <div class="col-md-8">
        <input type="text" class="form-control" wire:model="productCode">
    </div>
</div>

<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="product_name" class="col-form-label">
            Product name
            <small>
                <i class="bi bi-asterisk text-danger"></i>
            </small>
        </label>
    </div>
    <div class="col-md-8">
        <input type="text" class="form-control {{$productNameRequired ? 'is-invalid' : ''}}" wire:model="productName">
        @if ($productNameRequired)
        <div class="invalid-feedback">
            Product name is required.
        </div>
        @endif
    </div>
</div>

<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="description" class="col-form-label">Description</label>
    </div>
    <div class="col-md-8">
        <textarea class="form-control" rows="3" wire:model="productDescription"></textarea>
    </div>
</div>

<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="note" class="col-form-label">Note</label>
    </div>
    <div class="col-md-8">
        <textarea class="form-control" rows="3" wire:model="productNote"></textarea>
    </div>
</div>

<div class="row my-3">
    <div class="px-5">
        <button type="button" class="btn btn-primary float-end mx-4" wire:click="createProduct">
            Create
        </button>
    </div>
</div>