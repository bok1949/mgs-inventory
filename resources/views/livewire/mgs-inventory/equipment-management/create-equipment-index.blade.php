<div>
    <div class="row">
        <div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2"></div>
        <div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8">
            <div class="form-data-wrapper">
                @if (session()->has('message'))
                    <div id="msg" class="row">
                        <div class="alert alert-success d-flex  justify-content-between" role="alert">
                            <i class="bi bi-check-circle-fill"></i>
                            <div class="text-center">
                                {{ session('message') }}
                            </div>
                            <i role="button" data-bs-dismiss="alert" class="bi bi-x"></i>
                        </div>
                    </div>
                @endif

                @include('livewire.mgs-inventory.equipment-management.create-equipment-form')

                <div class="row my-3">
                    <div class="px-5">
                        <a href="#msg">
                            <button type="button" class="btn btn-primary float-end mx-4" wire:click="createEquipment">
                                Save
                            </button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
