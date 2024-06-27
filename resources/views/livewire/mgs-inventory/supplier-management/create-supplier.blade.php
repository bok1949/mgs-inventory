<div>
    @if(session('success') && session('success_expires_at'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.alert-success').style.display = 'none';
        }, {{ now()->diffInMilliseconds(session('success_expires_at')) }});
    </script>
    @endif
    @if(session('fail') && session('danger_expires_at'))
    <div class="alert alert-danger">
        {{ session('fail') }}
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.alert-danger').style.display = 'none';
        }, {{ now()->diffInMilliseconds(session('danger_expires_at')) }});
    </script>
    @endif
    <div class="card border shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="card-header p-0">
            <h2 class="text-start mb-0 text-center">Fill up Supplier Information</h2>
        </div>
        <hr>
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route('supplier-list') }}" class="btn btn-primary me-1 mb-1">Go to supplier list</a>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" wire:submit.prevent="addSupplier">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <p class="text-end">Supplier Name</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left ">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model="supplierName">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('supplierName') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <p class="text-end">Address</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left ">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model="address">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('address') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <p class="text-end">Phone Number</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left ">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model="cpNumber">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('cpNumber') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <p class="text-end">Telephone Number</p>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left ">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model="landlineNumber">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('landlineNumber') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>