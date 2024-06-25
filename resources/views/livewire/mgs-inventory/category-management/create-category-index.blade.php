<div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="form-data-wrapper">
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

                {{-- FORM --}}
                <div class="row align-items-center my-2">
                    <div class="col-md-3 text-end">
                        <label for="category_name" class="col-form-label">
                            Category name
                            <small>
                                <i class="bi bi-asterisk text-danger"></i>
                            </small>
                        </label>
                    </div>
                    <div class="col-md-8">
                        <input id="category_name" type="text" class="form-control {{$categoryNameRequired ? 'is-invalid' : ''}}" wire:model="categoryName">
                        @if ($categoryNameRequired)
                        <div class="invalid-feedback">
                            Product name is required.
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row align-items-center my-2">
                    <div class="col-md-3 text-end">
                        <label for="note" class="col-form-label">Note</label>
                    </div>
                    <div class="col-md-8">
                        <textarea id="note" class="form-control" rows="3" wire:model="categoryNote"></textarea>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="px-5">
                        <button type="button" class="btn btn-primary float-end mx-4" wire:click="createCategory">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
