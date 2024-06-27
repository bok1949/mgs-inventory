<div>
    <div 
        wire:ignore.self 
        class="modal fade" 
        data-bs-backdrop='static' 
        data-bs-keyboard="false" 
        tabindex="-2"
        id="updateSupplierModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="white mx-2"><i class="bi bi-pencil-square"></i></h5>
                    <h5 class="modal-title white">
                        Edit <span class="text-decoration-underline"></span> Supplier Information
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
                            <label for="product_code" class="col-form-label">Supplier Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" wire:model="suppName" />
                        </div>
                    </div>
                    
                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="product_name" class="col-form-label">
                                Address
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" wire:model="address" />
                        </div>
                    </div>
                    
                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="description" class="col-form-label">Phone Number</label>
                        </div>
                        <div class="col-md-8">
                        <input type="text" class="form-control" wire:model="phoneNum" />
                        </div>
                    </div>
                    
                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="note" class="col-form-label">Landline</label>
                        </div>
                        <div class="col-md-8">
                        <input type="text" class="form-control" wire:model="telNum" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</a>
                    <a href="#" class="btn btn-primary" wire:click="updateSupplierInfo">
                        Save
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
