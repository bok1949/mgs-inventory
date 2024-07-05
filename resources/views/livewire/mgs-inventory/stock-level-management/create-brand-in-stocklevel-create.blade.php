<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card createNewBrandOrSupplier">
            <div class="card-header">
                <h4 class="card-title">Create Brand</h4>
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
                            <label for="first-name-horizontal-icon">Brand Name: <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input 
                                        type="text" 
                                        wire:model.defer="brand_name" 
                                        class="form-control @error('brand_name') is-invalid @enderror" 
                                        placeholder="Brand name..."
                                    >
                                    <div class="form-control-icon">
                                        <i class="bi bi-tag"></i>
                                    </div>
                                </div>
                                @error('brand_name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3 text-end">
                            <label for="email-horizontal-icon">Note:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <textarea class="form-control" wire:model.defer="note" placeholder="Note...">
                                    </textarea>
                                    <div class="form-control-icon">
                                        <i class="bi bi-journals"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" wire:click="cancelCreateNewBrandOrSupplier('brand')" class="btn btn-warning me-1 mb-1">Cancel</button>
                            <button type="submit" wire:click="saveBrandInStockLevelCreate" class="btn btn-primary me-1 mb-1">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>