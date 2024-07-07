<div>
    <div 
        wire:ignore.self 
        class="modal fade" 
        data-bs-backdrop="static" 
        data-bs-keyboard="false" 
        tabindex="-1"
        id="openModalToConfirmItemDeletion" 
        role="dialog"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h1 class="modal-title white mx-2" >
                        !
                    </h1>
                    <h5 class="modal-title white">
                        Warning 
                    </h5>
                    <button type="button" data-bs-dismiss="modal" class="btn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    
                    <div class="row align-items-center my-2">
                        <div class="col-md-12">
                            <p class="text-mutted text-center">
                                You are about to remove permanently the item 
                                <span class="text-decoration-underline">{{ $productName }}</span>

                                @if (!empty($itemData->specification))
                                    {{ ' (' . $itemData->specification . ')' }}
                                @endif

                                @if (!empty($itemData->available))
                                    {{
                                        ' with available stock of ' . $itemData->available . ' ' . $itemData->unit_measurement ?? ''
                                    }}
                                @endif

                            </p>
                        </div>
                    </div>
    
                </div> {{-- end of modal body --}}
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</a>
                    <a href="#" wire:click="continueDeletion" data-bs-dismiss="modal" class="btn btn-warning">Continue</a>
                </div>
            </div>
        </div>
    </div>
</div>
