<div>
    <div 
        wire:ignore.self 
        class="modal fade" 
        data-bs-backdrop='static' 
        data-bs-keyboard="false" 
        tabindex="-2"
        id="updateEquipmentModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="white mx-2"><i class="bi bi-pencil-square"></i></h5>
                    <h5 class="modal-title white">
                        Update equipment
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
                            <label for="product_code" class="col-form-label">
                                Category
                                <small>
                                    <i class="bi bi-asterisk text-danger"></i>
                                </small>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-select" wire:model="categoryId">
                                @foreach ($categories as $category)
                                    <option 
                                        value="{{$category->categoryId}}" 
                                        @if ($categoryId==$category->categoryId)
                                        selected
                                        @endif
                                    >
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
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
                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</a>
                    <a href="#" class="btn btn-primary" wire:click="saveChanges">
                        Save
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
