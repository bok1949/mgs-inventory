@extends('../mgs-inventory/inv-layout/layout')

@section('page-heading')
    <h3>Dashboard</h3>
@endsection

@section('page-content')
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon purple mb-2">
                                <i class="iconly-boldShow"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Profile Views</h6>
                            <h6 class="font-extrabold mb-0">112.000</h6>
                        </div>
                    </div>
                </div>
            </div> {{-- end of card--}}
        </div>
    </div> {{-- end of row --}}
@endsection


