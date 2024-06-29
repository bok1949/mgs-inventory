<div>
    <div 
     wire:ignore.self 
     class="modal fade" 
     data-bs-backdrop='static' 
     data-bs-keyboard="false" 
     tabindex="-2" 
     id="createEquipmentModal" 
     role="dialog">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Create Equipment</h5>
                     <a href="{{ route('equipment-list-index') }}" type="button" class="btn-close" aria-label="Close"></a>
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
                     @include('livewire.mgs-inventory.equipment-management.create-equipment-form')
                 </div>
                 <div class="modal-footer">
                     <a href="{{ route('equipment-list-index') }}" class="btn btn-secondary">Cancel</a>
                     <a 
                         href="#" 
                         class="btn btn-primary"
                         wire:click="createEquipment"
                     >
                         <i class="bi bi-floppy"></i> Save
                     </a>
                 </div>
             </div>
         </div>
    </div>
 </div>
 