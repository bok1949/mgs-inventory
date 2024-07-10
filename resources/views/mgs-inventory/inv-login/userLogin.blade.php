<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MGS</title>
        {{-- bootstrap link --}}

        {{-- css layout --}}
        {{-- css natin --}}

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        
        {{--  <link rel="stylesheet" href="./assets/compiled/css/app.css">
        <link rel="stylesheet" href="./assets/compiled/css/iconly.css"> --}}
        
        <link rel="stylesheet" href="{{ URL::asset('new-assets/compiled/css/app.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('new-assets/compiled/css/iconly.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('new-assets/compiled/css/app-dark.css')}}">

        <link rel="stylesheet" href="{{ URL::asset('new-assets/extensions/@icon/dripicons/dripicons.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('new-assets/extensions/@fortawesome/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('new-assets/extensions/toastify-js/src/toastify.css')}}">
        
        <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css')}}">
    @livewireStyles

    </head>

    <body>
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    @livewire('inv-user-login.user-login')
                </div>
            </div> {{-- end of card--}}
        </div>
    </div> {{-- end of row --}}

    @include('mgs-inventory/inv-layout/footer')
    @livewireScripts
    
    </body>
</html>