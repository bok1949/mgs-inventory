@extends('../mgs-inventory/inv-layout/layout')

@section('page-heading')
<h3>Equipment List</h3>
@endsection

@section('page-content')
<div class="row">
    <div class="col-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                @livewire('mgs-inventory.equipment-management.equipment-list-index')
            </div>
        </div> {{-- end of card--}}
    </div>
</div> {{-- end of row --}}
@endsection