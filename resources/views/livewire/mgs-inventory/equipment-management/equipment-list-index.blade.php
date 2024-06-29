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
                        placeholder="Search Equipment..."
                        wire:model.debounce.3000="searchEquipmentNo">
                    <div class="form-control-icon">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3">
            <a 
                href="#" 
                wire:click="openCreateEquipmentModal()" 
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#createEquipmentModal"
            >
                <i class="bi bi-plus"></i> Create Equipment
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
                            <th scope="col">Maker</th>
                            <th scope="col">Equipment No.</th>
                            <th scope="col">Plate No.</th>
                            <th scope="col">Engine No.</th>
                            <th scope="col">Chassis No.</th>
                            <th scope="col">Date Purchased</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = $equipments->total();
                            $currentPage = $equipments->currentPage();
                            $perPage = $equipments->perPage();
                            
                            $from = ($currentPage - 1) * $perPage + 1;
                            $to = min($currentPage * $perPage, $total);
                                                        
                            $counter = $from;
                        @endphp
                        @forelse ($equipments as $equipment)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $equipment->maker }}</td>
                                <td>{{ $equipment->equipment_no }}</td>
                                <td>{{ $equipment->plate_no }}</td>
                                <td>{{ $equipment->engine_no }}</td>
                                <td>{{ $equipment->chassis_no }}</td>
                                <td>{{ $equipment->date_purchased }}</td>
                                <td>
                                    <a 
                                        href="#"
                                        wire:click.stop="openModalToViewEquipment({{$equipment->equipmentId}})"
                                        data-bs-toggle="modal"
                                        data-bs-target="#viewEquipmentModal"
                                    >
                                        <i class="bi bi-eye"></i>
                                    </a> |
                                    <a 
                                        href="#" 
                                        wire:click.stop="openModalToUpdateEquipment({{$equipment->equipmentId}})"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateEquipmentModal"
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
                                        No data yet! <br>
                                        <a href="{{ route('create-equipment-index') }}" class="alert-link">Click here to create a Equipment</a>
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
            {{ $equipments->links() }}
        </div>
    </div>

    @livewire('mgs-inventory.equipment-management.modal-create-equipment')
    @livewire('mgs-inventory.equipment-management.modal-update-equipment')
    @livewire('mgs-inventory.equipment-management.modal-view-equipment')

</div>
