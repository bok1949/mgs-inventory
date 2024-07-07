<div>
    <div 
        wire:ignore.self 
        class="modal fade" 
        data-bs-backdrop="static"
        data-bs-keyboard="false" 
        tabindex="-2"
        id="openModalToEditItem" 
        role="dialog"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="white mx-2"><i class="bi bi-pencil-square"></i></h5>
                    <h5 class="modal-title white">
                        Update <span class="text-decoration-underline">{{ $productName }}</span> product
                    </h5>
                    <button type="button" data-bs-dismiss="modal" class="btn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    
                    @if (session()->has('message'))
                    <div class="row">
                        <div class="alert alert-success d-flex  justify-content-between" role="alert">
                            <i class="bi bi-check-circle-fill"></i>
                            <div class="text-center">
                                {{ session('message') }}
                            </div>
                            <i role="button" data-bs-dismiss="alert" class="bi bi-x"></i>
                        </div>
                    </div>
                    @endif

                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="" class="col-form-label">
                                Supplier
                                <small>
                                    <i class="bi bi-asterisk text-danger"></i>
                                </small>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" wire:model.defer="supplier_id">
                                @foreach ($suppliers as $supplier)
                                    <option 
                                        value="{{$supplier->supplierId}}"
                                        {{$supplier->supplierId === $supplier_id ? 'selected' : ''}} 
                                    >
                                        {{ $supplier->supplier_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="" class="col-form-label">
                                Brand
                                <small>
                                    <i class="bi bi-asterisk text-danger"></i>
                                </small>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" wire:model.defer="brand_id">
                                @foreach ($brands as $brand)
                                    <option 
                                        value="{{$brand->brandId}}"
                                        {{$brand->brandId === $brand_id ? 'selected' : ''}} 
                                    >
                                        {{ $brand->brand_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    
                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="price" class="col-form-label">Price</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" wire:model.defer="price">
                        </div>
                    </div>

                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="avilable" class="col-form-label">
                                Available stock
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" wire:model.defer="available">
                        </div>
                    </div>

                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="defective" class="col-form-label">
                                Defective stock
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" wire:model.defer="defective">
                        </div>
                    </div>

                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="unit-measurement" class="col-form-label">
                                Unit of measurement
                            </label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" wire:model.defer="unit_measurement">
                                @include('livewire.mgs-inventory.formselect-unit-of-measurement')
                            </select>
                        </div>
                    </div>
    
                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="specification" class="col-form-label">Specification</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3" wire:model.defer="specification">
                                </textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</a>
                    <a href="#" class="btn btn-primary" wire:click="saveItemEditedData">
                        Save changes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
