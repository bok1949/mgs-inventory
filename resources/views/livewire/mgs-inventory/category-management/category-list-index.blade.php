<div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xxl-12">
            {{-- create filters and search categories here --}}
            {{-- create clear filter and serach box also --}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1">
        </div>
        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8 col-sm-8">
            <div class="form-group has-icon-left">
                <div class="position-relative">
                    <input 
                        type="text" 
                        class="form-control" 
                        placeholder="Search category name..."
                        wire:model.debounce.3000="searchCategory"
                    >
                    <div class="form-control-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="data-table-wrapper">
                <table class="table">
                    <thead> 
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Note</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = $categories->total();
                            $currentPage = $categories->currentPage();
                            $perPage = $categories->perPage();
                            
                            $from = ($currentPage - 1) * $perPage + 1;
                            $to = min($currentPage * $perPage, $total);
                                                        
                            $counter = $from;
                        @endphp

                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->note }}</td>
                                <td>
                                    {{-- Action --}}
                                    {{-- <a 
                                        href="#"
                                        wire:click.stop="openModalToViewStock({{$category->categoryId}})"
                                        data-bs-toggle="modal"
                                        data-bs-target="#viewStockModal"
                                    >
                                        <i class="bi bi-eye"></i>
                                    </a> | --}}
                                    {{-- Edit Button --}}
                                    <a 
                                        href="#" 
                                        wire:click.stop="openModalToUpdateCategory({{$category->categoryId}})"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateCategoryModal"
                                    >
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
                                        No result! <br>
                                        <a href="{{ route('create-category-index') }}" class="alert-link">Click here to create a Product</a>
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
            {{ $categories->links() }}
        </div>
    </div>

    {{-- @livewire('mgs-inventory.category-management.modal-create-category') --}}
    @livewire('mgs-inventory.category-management.modal-update-category')
    {{-- @livewire('mgs-inventory.category-management.modal-view-category') --}}
</div>
