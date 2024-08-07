<div>
    <div 
        wire:ignore.self 
        class="modal fade" 
        data-bs-backdrop="static" 
        data-bs-keyboard="false" 
        tabindex="-2"
        id="openModalToViewItem" 
        role="dialog"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="white mx-2"><i class="bi bi-info-lg"></i></h5>
                    <h5 class="modal-title white">
                        About <span class="text-decoration-underline">{{ $productName }}</span> item
                    </h5>
                    <button type="button" data-bs-dismiss="modal" class="btn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    
                    <div class="row align-items-center my-2">
                        <div class="col-md-12">
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Available stock</div>
                                        {{$itemData->available ?? 0}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Defective stock</div>
                                        {{$itemData->defective ?? 0}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Unit of measurement</div>
                                        {{$itemData->unit_measurement ?? 'not set'}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Price</div>
                                        {{$itemData->price ?? 0.0}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Item specification</div>
                                        {{$itemData->specification ?? 'no specification'}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Brand of the item</div>
                                        {{$itemData->brand_name ?? 'not set'}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Supplier</div>
                                        {{$itemData->supplier_name ?? 'not set'}}
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
    
                </div> {{-- end of modal body --}}
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
