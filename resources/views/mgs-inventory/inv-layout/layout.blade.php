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

</head>
<body>
    {{-- header nav bar --}}
    <header>Header</header>

    {{-- main --}}
    <div class="page-content">
        @yield('page-content')
    </div>

    {{-- footer --}}
    <footer>Footer</footer>
</body>
</html>