<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card createNewBrandOrSupplier">
            <div class="card-header">
                <h4 class="card-title">Create Supplier</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @session('success-message')
                    <div class="row">
                        <div class="alert alert-success d-flex  justify-content-between" role="alert">
                            <i class="bi bi-check-circle-fill"></i>
                            <div class="text-center">
                                {{ session('success-message') }}
                            </div>
                            <i role="button" data-bs-dismiss="alert" class="bi bi-x"></i>
                        </div>
                    </div>
                    @endsession
                    <div class="row">
                        <div class="col-md-3 text-end">
                            <label for="first-name-horizontal-icon">Supplier Name: <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input 
                                        type="text" 
                                        wire:model.defer="supplier_name" 
                                        class="form-control @session('supplier-name-error') is-invalid @endsession " 
                                        placeholder="Supplier name..."
                                    >
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                </div>
                                @session('supplier-name-error') 
                                    <span class="text-danger">{{ session('supplier-name-error') }}</span>
                                @endsession
                            </div>
                        </div>
                        <div class="col-md-3 text-end">
                            <label for="email-horizontal-icon">Address:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <textarea 
                                        class="form-control" 
                                        wire:model.defer="address" 
                                        placeholder="Address..."
                                    >
                                    </textarea>
                                    <div class="form-control-icon">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 text-end">
                            <label for="first-name-horizontal-icon">Phone number: </label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input 
                                        type="number" 
                                        wire:model.defer="phone_number" 
                                        class="form-control @session('phone-number-error') is-invalid @endsession" 
                                        placeholder="Phone number..."
                                    >
                                    <div class="form-control-icon">
                                        <i class="bi bi-phone-fill"></i>
                                    </div>
                                </div>
                                @session('phone-number-error')
                                    <span class="text-danger">{{ session('phone-number-error') }}</span>
                                @endsession
                            </div>
                        </div>
                        <div class="col-md-3 text-end">
                            <label for="first-name-horizontal-icon">Landline: </label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input 
                                        type="number" 
                                        wire:model.defer="landline" 
                                        class="form-control" 
                                        placeholder="Land line number..."
                                    >
                                    <div class="form-control-icon">
                                        <i class="bi bi-telephone-inbound-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button 
                                type="submit" 
                                wire:click="cancelCreateNewBrandOrSupplier('supplier')"
                                class="btn btn-warning me-1 mb-1"
                            >
                                Cancel
                            </button>
                            <button 
                                type="submit" 
                                wire:click="saveSupplierInStockLevelCreate"
                                class="btn btn-primary me-1 mb-1"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>