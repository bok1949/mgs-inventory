<div>
    <div 
        wire:ignore.self 
        class="modal fade" 
        data-bs-backdrop="static" 
        data-bs-keyboard="false" 
        tabindex="-1"
        id="openModalToViewItemHistory" 
        role="dialog"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="white mx-2"><i class="bi bi-info-lg"></i></h5>
                    <h5 class="modal-title white">
                        History of <span class="text-decoration-underline">{{ $productName }}</span> item
                    </h5>
                    <button type="button" data-bs-dismiss="modal" class="btn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    
                    under development
    
                </div> {{-- end of modal body --}}
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
