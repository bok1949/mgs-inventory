@if ($newCategory)
<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="product_code" class="col-form-label">
            Category name
            <small>
                <i class="bi bi-asterisk text-danger"></i>
            </small>
        </label>
    </div>
    <div class="col-md-8">
        <input type="text" class="form-control {{$categoryNameRequired ? 'is-invalid' : ''}}" wire:model="categoryName">
        @if ($categoryNameRequired)
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
        <label for="maker" class="col-form-label">Maker</label>
    </div>
    <div class="col-md-8">
        <input id="maker" type="text" class="form-control" wire:model="maker">
    </div>
</div>

<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="equipment_no" class="col-form-label">
            Equipment No.
            <small>
                <i class="bi bi-asterisk text-danger"></i>
            </small>
        </label>
    </div>
    <div class="col-md-8">
        <input id="equipment_no" type="text" class="form-control {{$equipmentNoRequired ? 'is-invalid' : ''}}" wire:model="equipmentNo">
        @if ($equipmentNoRequired)
        <div class="invalid-feedback">
            Equipment No. is required.
        </div>
        @endif
    </div>
</div>

<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="plate_no" class="col-form-label">Plate No.</label>
    </div>
    <div class="col-md-8">
        <input id="plate_no" type="text" class="form-control" wire:model="plateNo">
    </div>
</div>

<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="engine_no" class="col-form-label">Engine No.</label>
    </div>
    <div class="col-md-8">
        <input id="engine_no" type="text" class="form-control" wire:model="engineNo">
    </div>
</div>

<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="chassis_no" class="col-form-label">Chassis No.</label>
    </div>
    <div class="col-md-8">
        <input id="chassis_no" type="text" class="form-control" wire:model="chassisNo">
    </div>
</div>

<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="equipment_desc" class="col-form-label">Equipment Description</label>
    </div>
    <div class="col-md-8">
        <textarea id="equipment_desc" class="form-control" rows="3" wire:model="equipmentDesc"></textarea>
    </div>
</div>

<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="date_purchased" class="col-form-label">Date Purchased</label>
    </div>
    <div class="col-md-8">
        <input id="date_purchased" type="date" class="form-control" wire:model="datePurchased">
    </div>
</div>

<div class="row align-items-center my-2">
    <div class="col-md-3 text-end">
        <label for="equipment_note" class="col-form-label">Equipment Note</label>
    </div>
    <div class="col-md-8">
        <textarea id="equipment_note" class="form-control" rows="3" wire:model="equipmentNote"></textarea>
    </div>
</div>