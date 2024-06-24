<div>
   <div 
    wire:ignore.self 
    class="modal fade" 
    data-bs-backdrop='static' 
    data-bs-keyboard="false" 
    tabindex="-2" 
    id="createStockModal" 
    role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create product</h5>
                    <a href="{{ route('stock-list') }}" type="button" class="btn-close" aria-label="Close"></a>
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
                    @include('livewire.mgs-inventory.stock-management.create-stock-form')
                </div>
                <div class="modal-footer">
                    <a href="{{ route('stock-list') }}" class="btn btn-secondary">Cancel</a>
                    <a 
                        href="#" 
                        class="btn btn-primary"
                        wire:click="createProduct"
                    >
                        <i class="bi bi-floppy"></i> Save
                    </a>
                </div>
            </div>
        </div>
   </div>
</div>
