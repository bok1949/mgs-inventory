<div>
    <div 
        wire:ignore.self 
        class="modal fade" 
        data-bs-backdrop='static' 
        data-bs-keyboard="false" 
        tabindex="-2"
        id="updateStockModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="white mx-2"><i class="bi bi-pencil-square"></i></h5>
                    <h5 class="modal-title white">
                        Update <span class="text-decoration-underline">{{ $productName }}</span> product
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
                            <label for="product_code" class="col-form-label">Product code</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" wire:model="productCode" />
                        </div>
                    </div>
                    
                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="product_name" class="col-form-label">
                                Product name
                                <small>
                                    <i class="bi bi-asterisk text-danger"></i>
                                </small>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input 
                                type="text" 
                                class="form-control {{$productNameRequired ? 'is-invalid' : ''}}" 
                                wire:model="productName"
                            >
                            @if ($productNameRequired)
                                <div class="invalid-feedback">
                                    Product name is required.
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="description" class="col-form-label">Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3" wire:model="productDescription">
                            </textarea>
                        </div>
                    </div>
                    
                    <div class="row align-items-center my-2">
                        <div class="col-md-3 text-end">
                            <label for="note" class="col-form-label">Note</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3" wire:model="productNote">
                            </textarea>
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
