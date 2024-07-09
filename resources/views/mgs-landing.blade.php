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
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card m-5 p-5 rounded d-flex align-items-center custom-shadow" style="max-width: 70%;">
            <img src="{{ URL::asset('new-assets/images/logo/logo.png')}}" alt="MSG" style="width: 70%; height: 60%;">
            <div class= "ml-auto mt-4">
                <button class="pushable m-2" title="Go to Inventory" onclick="window.location.href='{{ route('dashboard') }}'">
                    <span class="shadow"></span>
                    <span class="edge"></span>
                    <span class="front">
                    <strong>Inventory</strong>
                    </span>
                </button>
                <button class="pushable m-2" title="Go to Payroll">
                    
                    <span class="shadow"></span>
                    <span class="edge"></span>
                    <span class="front">
                    <strong>Payroll</strong>
                    </span>
                </button>
            </div>
        </div>
    </div>
</body>
</html>