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
                        placeholder="Search product name..."
                        wire:model.debounce.3000="searchProduct">
                    <div class="form-control-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <a 
                href="#" 
                wire:click="openCreateStockModal()" 
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#createStockModal"
            >
                <i class="bi bi-plus"></i> Create Product
            </a>
        </div>
    </div>

    <div class="row mb-3 align-items-center">
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
    </div>

    @if ($filteredCategoryName)
        <div class="row mb-3 align-items-center">
            <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6">
                <h5 class="text-center">List of {{$filteredCategoryName->category_name}}</h5>
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
                            <th scope="col">Product code</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = $products->total();
                            $currentPage = $products->currentPage();
                            $perPage = $products->perPage();
                            
                            $from = ($currentPage - 1) * $perPage + 1;
                            $to = min($currentPage * $perPage, $total);
                                                        
                            $counter = $from;
                        @endphp
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <a href="#">
                                        <i class="bi bi-eye"></i>
                                    </a> |
                                    <a href="#">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $counter++;
                            @endphp
                        @empty
                            <tr>
                                <th colspan="4">
                                    <div class="alert alert-warning" role="alert">
                                        No data yet! <br>
                                        <a href="{{ route('create-stock-index') }}" class="alert-link">Click here to create a Product</a>
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
            {{ $products->links() }}
        </div>
    </div>

    @livewire('mgs-inventory.stock-management.modal-create-stock')

</div>
