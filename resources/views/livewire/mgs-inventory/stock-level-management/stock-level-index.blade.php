<div>
    <div class="row">
        <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1">
        </div>
        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8">
            <div class="form-group has-icon-left">
                <div class="position-relative">
                    <input 
                        type="text" 
                        class="form-control" 
                        placeholder="Search product name, supplier, or brand..."
                        wire:model.debounce.3000="searchItem">
                    <div class="form-control-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <a href="#" 
                class="btn btn-primary" 
                data-bs-toggle="modal"
                data-bs-target="#modalAddStockToStockLevel">
                <i class="bi bi-plus"></i> Add Items
            </a>
        </div>
    </div>
    
    <div class="row mb-3 align-items-center">
        <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1"></div>
        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-6 col-sm-6">
            <select class="form-select" wire:model.debounce.3000="filterBySupplier">
                <option selected class="text-muted">Filter by supplier...</option>
                @forelse ($suppliers as $supplier)
                    <option value="{{$supplier->supplier_id}}">{{ $supplier->supplier_name }}</option>
                @empty
                    <option class="text-warning">
                        No supplier available...
                    </option>
                @endforelse
            </select>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-6 col-sm-6">
            <select class="form-select" wire:model.debounce.3000="filterByBrand">
                <option selected class="text-muted">Filter by brand...</option>
                @forelse ($brands as $brand)
                    <option value="{{$brand->brand_id}}">{{ $brand->brand_name }}</option>
                @empty
                    <option class="text-warning">
                        No brand available...
                    </option>
                @endforelse
            </select>
        </div>
        <div class="col-md-3">
            <a href="#" wire:click="clearFilter" class="text-info">Clear filter</a>
        </div>
    </div>
    
    @if ($filteredSupplierName)
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6">
                <h5 class="text-center">
                    List of {{$filteredSupplierName->supplier_name}}
                </h5>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
        </div>
    @endif

    @if ($filteredBrandName)
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6">
                <h5 class="text-center">
                    List of {{$filteredBrandName->brand_name}}
                </h5>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="data-table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Available</th>
                            <th scope="col">Defective</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = $productItems->total();
                            $currentPage = $productItems->currentPage();
                            $perPage = $productItems->perPage();
        
                            $from = ($currentPage - 1) * $perPage + 1;
                            $to = min($currentPage * $perPage, $total);
        
                            $counter = $from;
                        @endphp
                        @forelse ($productItems as $productItem)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $productItem->product_code ?? 'no code'}} : {{ $productItem->product_name }}</td>
                            <td>{{ $productItem->supplier_name }}</td>
                            <td>{{ $productItem->brand_name }}</td>
                            <td>
                                {{ $productItem->available ? $productItem->available . ' ' . $productItem->unit_measurement ?? '' : ''}} 
                            </td>
                            <td>
                                {{ $productItem->defective ? $productItem->defective . ' ' . $productItem->unit_measurement ?? '' : ''}}
                            </td>
                            <td>{{ $productItem->price ?? '' }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                
                                    <ul class="dropdown-menu dropdown-stocklevel-index" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a 
                                                href="#" 
                                                class="dropdown-item"
                                                wire:click.stop="openModalToViewItem({{$productItem->itemId}}, '{{$productItem->product_name}}')"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#openModalToViewItem"
                                            >
                                                <i class="bi bi-eye"></i>
                                                View item
                                            </a>
                                        </li>
                                        <li>
                                            <a 
                                                class="dropdown-item" 
                                                href="#"
                                                wire:click.stop="openModalToEditItem({{$productItem->itemId}}, '{{$productItem->product_name}}')"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#openModalToEditItem"
                                            >
                                                <i class="bi bi-pencil-square"></i> 
                                                Edit item
                                            </a>
                                        </li>
                                        <li>
                                            <a 
                                                class="dropdown-item" 
                                                href="#"
                                                wire:click.stop="openModalToViewHistory({{$productItem->itemId}}, '{{$productItem->product_name}}')"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#openModalToViewItemHistory"
                                            >
                                                <i class="bi bi-clock-history"></i> 
                                                Show history
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a 
                                                class="dropdown-item text-danger" 
                                                href="#"
                                                wire:click.stop="openModalToConfirmItemDeletion({{$productItem->itemId}}, '{{$productItem->product_name}}')" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#openModalToConfirmItemDeletion"
                                            >
                                                <i class="bi bi-trash"></i> Delete this item
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                            @php
                                $counter++;
                            @endphp
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
    
    <div class="row">
        <div class="col d-flex justify-content-start align-items-center">
            Showing &nbsp;<strong>{{ $from }}</strong>
            &nbsp;to&nbsp; <strong>{{ $to }}</strong>
            &nbsp;of&nbsp; <strong>{{ $total }}</strong>&nbsp; entries
        </div>
        <div class="col d-flex justify-content-end">
            {{ $productItems->links() }}
        </div>
    </div>

    @livewire('mgs-inventory.stock-level-management.stock-level-add-product')
    @livewire('mgs-inventory.stock-level-management.modal-to-edit-item')
    @livewire('mgs-inventory.stock-level-management.modal-to-view-item')
    @livewire('mgs-inventory.stock-level-management.modal-to-confirm-deletion')
    @livewire('mgs-inventory.stock-level-management.modal-to-view-item-history')

<script>
    window.addEventListener('create-success', event => {
        window.setTimeout(function() {
            $(".alert-success").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove();
            });
        }, 4000);
    });

    window.addEventListener('create-error', event => {
        alert(event.detail.error_message);
    });

    window.addEventListener('error-adding-items', event => {
        alert(event.detail.message);
    });

    window.addEventListener('success-deletion', event => {
        Toastify({
            text: event.detail.deleteMessage,
            duration: 5000,
            close:true,
            gravity:"top",
            position: "center",
            style: {
                background: "#198754"
            }
        }).showToast();
    });

    
        
</script>


</div>
