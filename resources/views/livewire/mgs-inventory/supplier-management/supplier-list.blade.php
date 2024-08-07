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
                        placeholder="Search supplier name..."
                        wire:model.debounce.3000="searchSupplier">
                    <div class="form-control-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 d-flex justify-content-end align-items-center" role="alert">
            <a href="{{ route('create-supplier') }}" class="btn  btn-primary me-1 mb-1">Add Supplier</a>
        </div>
    </div>

    <!-- <div class="row mb-3 align-items-center">
        <div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1"></div>
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 col-sm-6">
            <div class="col-md-12">
                <select class="form-select" wire:model="filterByCategory">
                    <option selected>Filter by category...</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <a href="#" wire:click="clearFilter" class="text-info">Clear filter</a>
        </div>
    </div> -->

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="data-table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Telephone Number</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = $suppliers->total();
                            $currentPage = $suppliers->currentPage();
                            $perPage = $suppliers->perPage();
                            
                            $from = ($currentPage - 1) * $perPage + 1;
                            $to = min($currentPage * $perPage, $total);
                                                        
                            $counter = $from;
                        @endphp
                        @forelse ($suppliers as $supplier)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $supplier->supplier_name }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td>{{ $supplier->phone_number !== 0 ? $supplier->phone_number : 'Not provided' }}</td>
                                <td>{{ $supplier->landline !== '0' ? $supplier->landline : 'Not provided' }}</td>
                                <td>
                                    <a 
                                        href="#" 
                                        wire:click.stop="openModalToUpdateSupplier({{$supplier->id}})"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateSupplierModal"
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
                                        No supplier found <br>
                                        <a href="{{ route('create-supplier') }}" class="alert-link"><u>Click here to add a Supplier</u></a>
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
            {{ $suppliers->links() }}
        </div>
    </div>

    @livewire('mgs-inventory.supplier-management.modal-update-supplier')

</div>
