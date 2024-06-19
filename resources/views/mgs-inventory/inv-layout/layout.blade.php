<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory</title>
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
    
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css')}}">
    
    @stack('style-per-page')
    @livewireStyles

</head>
<body>

<div id="app">
    <div id="main" class="layout-horizontal">
        {{-- Header --}}
        @include('mgs-inventory/inv-layout/header')

        <div class="content-wrapper container mt-5">
            <div class="page-heading">
                @yield('page-heading')
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        {{-- Page Content here --}}
                        @yield('page-content')
                    </div>
                </section> {{-- end of section --}}
            </div>
        </div>

        {{-- Footer --}}
        @include('mgs-inventory/inv-layout/footer')
    </div>
</div>
    

    @livewireScripts

    {{-- JavaScript --}}
    <script src="{{ URL::asset('new-assets/extensions/jquery/jquery.min.js')}}"></script>
    {{-- <script src="{{ URL::asset('assets/static/js/components/dark.js')}}"></script> --}}
    <script src="{{ URL::asset('new-assets/static/js/pages/horizontal-layout.js')}}"></script>
    <script src="{{ URL::asset('new-assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    
    
    <script src="{{ URL::asset('new-assets/compiled/js/app.js')}}"></script>
    


    <!-- Need: Apexcharts -->
    {{-- <script src="assets/extensions/apexcharts/apexcharts.min.js"></script> --}}
    <script src="{{ URL::asset('new-assets/static/js/pages/dashboard.js')}}"></script>
    <script src="{{ URL::asset('new-assets/bootstrap.bundle.min.js')}}"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script> --}}
    {{-- bootstrap.bundle.min.js --}}
</body>
</html>