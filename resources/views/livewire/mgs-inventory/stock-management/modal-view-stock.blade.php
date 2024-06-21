<div>
    <div 
        wire:ignore.self 
        class="modal fade" 
        data-bs-backdrop='static' 
        data-bs-keyboard="false" 
        tabindex="-2"
        id="viewStockModal" 
        role="dialog"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info ">
                    <h5 class="white mx-2"><i class="bi bi-info-circle"></i></h5>
                    <h5 class="modal-title white align-items-center">
                        <span>Product information</span>
                    </h5>
                    <button type="button" data-bs-dismiss="modal" class="btn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row align-items-center my-2">
                        <div class="col-md-12">
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Product category</div>
                                        {{$categoryName}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Product name</div>
                                        {{$productName}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Product code</div>
                                        {{$productCode}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Description</div>
                                        {{$productDescription}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Note</div>
                                        {{$productNote}}
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-secondary">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
