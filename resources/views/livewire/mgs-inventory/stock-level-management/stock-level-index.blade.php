<div>
    <div class="row">
        <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1">
        </div>
        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8">
            <div class="form-group has-icon-left">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search product name..."
                        wire:model.debounce.3000="searchProduct">
                    <div class="form-control-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <a href="#" 
                {{-- wire:click="openModalToAddProduct"  --}}
                class="btn btn-primary" 
                data-bs-toggle="modal"
                data-bs-target="#modalAddStockToStockLevel">
                <i class="bi bi-plus"></i> Add Product
            </a>
        </div>
    </div>
    
    {{-- <div class="row mb-3 align-items-center">
        <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1"></div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6">
            <div class="col-md-12">
                <select class="form-select" wire:model="filterByCategory">
                    <option selected>Filter by category...</option>
                    @forelse ($categories as $category)
                    <option value="{{$category->categoryId}}">{{ $category->category_name }}</option>
                    @empty
                    <option class="text-warning">
                        No categories availabel yet...
                    </option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <a href="#" wire:click="clearFilter" class="text-info">Clear filter</a>
        </div>
    </div> --}}
    
    {{-- @if ($filteredCategoryName)
    <div class="row mb-3 align-items-center">
        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6">
            <h5 class="text-center">List of {{$filteredCategoryName->category_name}}</h5>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
    </div>
    @endif --}}
    
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="data-table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product code</th>
                            <th scope="col">Product name</th>
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
                            <td>{{ $productItem->product_code }}</td>
                            <td>{{ $productItem->product_name }}</td>
                            <td>{{ $productItem->supplier_name }}</td>
                            <td>{{ $productItem->brand_name }}</td>
                            <td>{{ $productItem->available }} {{ $productItem->unit_measurement }}</td>
                            <td>{{ $productItem->defective }} {{ $productItem->unit_measurement }}</td>
                            <td>{{ $productItem->price }}</td>
                            <td>
                                <a href="#" wire:click.stop="openModalToViewStock({{$productItem->itemId}})"
                                    data-bs-toggle="modal" data-bs-target="#viewStockModal">
                                    <i class="bi bi-eye"></i>
                                </a> |
                                <a href="#" wire:click.stop="openModalToUpdateStock({{$productItem->itemId}})"
                                    data-bs-toggle="modal" data-bs-target="#updateStockModal">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
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

    
        
</script>


</div>
