<div>
    <div 
        wire:ignore.self 
        class="modal fade" 
        data-bs-backdrop='static' 
        data-bs-keyboard="false" 
        tabindex="-1"
        id="modalAddStockToStockLevel" 
        role="dialog"
    >
        <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white">Add product</h5>
                    <button type="button" data-bs-dismiss="modal" wire:click="cancelItemSelection" class="btn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <div class="row my-3">
                        <div class="col">
                            <a href="#" class="mx-4 {{$showCreateNewBrandInput ? 'text-decoration-underline' : ''}}" wire:click="createNewBrandOrSupplier('brand')">
                                <i class="bi bi-tag"></i> Create new brand
                            </a>
                            <a href="#" class="{{$showCreateNewSupplierInput ? 'text-decoration-underline' : ''}}" wire:click="createNewBrandOrSupplier('supplier')">
                                <i class="bi bi-building-gear"></i> Create new supplier
                            </a>
                        </div>
                    </div>
                    
                    @if ($showCreateNewBrandInput)
                        @include('livewire.mgs-inventory.stock-level-management.create-brand-in-stocklevel-create')
                    @endif

                    @if ($showCreateNewSupplierInput)
                        @include('livewire.mgs-inventory.stock-level-management.create-supplier-in-stocklevel-create')
                    @endif

                    <div class="row">
                        <label for="" class="col-md-2 col-form-label text-end">Product:</label>
                        <div class="col-md-7">
                            <input 
                                type="text" 
                                class="form-select"
                                placeholder="Search product..."
                                wire:model="searchProduct"
                                wire:click="toggleItem"
                            >

                            @if ($toggleToShowItem === true)
                                <ul class="list-group">
                                    @forelse ($products as $product)
                                        <li class="list-group-item">
                                            <a 
                                                class="" 
                                                href="#" 
                                                wire:click="selectProduct({{$product->productId}}, '{{$product->product_name}}', '{{$product->product_code}}')"
                                            >
                                                {{$product->product_code ?? 'no product code'}}
                                                : {{$product->product_name}}
                                            </a>
                                        </li>
                                    @empty
                                        <li class="list-group-item text-warning">No product available!</li>
                                    @endforelse
                                </ul>
                            @endif
                            
                        </div>
                    </div>

                    @session('success')
                    <div class="row my-2">
                        <div class="alert alert-success d-flex  justify-content-between" role="alert">
                            <i class="bi bi-check-circle-fill"></i>
                            <div class="text-center">
                                {{ session('success') }}
                            </div>
                            <i role="button" data-bs-dismiss="alert" class="bi bi-x"></i>
                        </div>
                    </div>
                    @endsession

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h5 class="text-center">Product level to create</h5>
                            <table class="table table-hover table-bordered create-stock-level-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Supplier</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Available</th>
                                        <th scope="col">Defective</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Specification</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($productLevelItems as $key=>$productLevelItem)
                                        <tr>
                                            <th scope="row">
                                                {{$productLevelItem['product_code'] ?? 'no code'}}:
                                                {{$productLevelItem['product_name']}}
                                            </th>
                                            <td>
                                                @if (count($suppliers) > 0)
                                                    <select class="form-select" wire:model="selectedSupplierIds.{{$key}}">
                                                        <option value="">Select supplier...</option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{$supplier->supplierId}}">{{$supplier->supplier_name}}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <p class="text-warning">No suppliers available!</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if (count($brands) > 0)
                                                    <select class="form-select" wire:model="selectedBrandIds.{{$key}}">
                                                        <option value="">Select brand...</option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{$brand->brandId}}">{{$brand->brand_name}}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <p class="text-warning">No brands available!</p>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" wire:model.defer="availableStockValues.{{$key}}" placeholder="Available stock...">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" wire:model.defer="defectiveStockValues.{{$key}}" placeholder="Defective stock...">
                                            </td>
                                            <td>
                                                <select class="form-select" wire:model.defer="selectedUnitMeasurements.{{$key}}">
                                                    @include('livewire.mgs-inventory.formselect-unit-of-measurement')
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" wire:model.defer="priceValues.{{$key}}" class="form-control" placeholder="Price in peso...">
                                            </td>
                                            <td>
                                                <input type="text" wire:model.defer="specificationValues.{{$key}}" class="form-control" placeholder="Specification...">
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots"></i>
                                                    </a>
                                                
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li>
                                                            <a  
                                                                href="#" 
                                                                class="dropdown-item"
                                                                wire:click="selectProduct({{$productLevelItem['product_id']}}, '{{$productLevelItem['product_name']}}', '{{$productLevelItem['product_code']}}')""
                                                            >
                                                                <i class="bi bi-plus-circle"></i> Duplicate this product
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li>
                                                            <a 
                                                                class="dropdown-item text-danger" 
                                                                href="#"
                                                                wire:click.stop="removeProductFromSelectionList({{$key}})"
                                                            >
                                                                <i class="bi bi-x-circle"></i> Remove this product
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="9">
                                                <div class="alert alert-warning text-center" role="alert">
                                                    No available data yet, add products to the stock level list.
                                                </div>
                                            </th>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" wire:click="cancelItemSelection" class="btn btn-secondary">Cancel</a>
                    @if ($showCreateButton)        
                        <a href="#" class="btn btn-primary" wire:click="saveChanges">
                            Create selected items
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
