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
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css')}}">
    

</head>
<body>
    {{-- header nav bar --}}
    {{-- <header>Header</header> --}}

    {{-- main --}}
    {{-- <div class="page-content">
        @yield('page-content')
    </div> --}}

<div id="app">
    <div id="main" class="layout-horizontal">
        <header class="mb-5 fixed-top">
            <div class="header-top ">
                <div class="container">
                    <div class="logo">
                        <a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo"></a>
                    </div>
                    <div class="header-top-right">

                        <div class="dropdown">
                            <a 
                                href="#" id="topbarUserDropdown"
                                class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar avatar-md2">
                                    <img src="{{ URL::asset('new-assets/compiled/jpg/1.jpg')}}" alt="Avatar">
                                </div>
                                <div class="text">
                                    <h6 class="user-dropdown-name">John Ducky</h6>
                                    <p class="user-dropdown-status text-sm text-muted">Member</p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                <li><a class="dropdown-item" href="#">My Account</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="auth-login.html">Logout</a></li>
                            </ul>
                        </div>

                        <!-- Burger button responsive -->
                        <a href="#" class="burger-btn d-block d-xl-none">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                    </div>
                </div>
            </div> {{--end of header-top--}}

            <nav class="main-navbar">
                <div class="container">
                    <ul>
                        <li class="menu-item  ">
                            <a href="index.html" class='menu-link'>
                                <span><i class="bi bi-grid-fill"></i> Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-item  has-sub">
                            <a href="#" class='menu-link'>
                                <span><i class="bi bi-stack"></i> Stock Mangement</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">
                                    <ul class="submenu-group">
                                        <li class="submenu-item  ">
                                            <a href="component-alert.html" class='submenu-link'>Stock Listing</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="menu-item active has-sub">
                            <a href="#" class='menu-link'>
                                <span><i class="bi bi-grid-1x2-fill"></i> Project Management</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">
                                    <ul class="submenu-group">
                                        <li class="submenu-item  ">
                                            <a href="layout-default.html" class='submenu-link'>Request of Materials & Equipment</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="layout-vertical-1-column.html" class='submenu-link'>Transmital Monitoring</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="layout-vertical-navbar.html" class='submenu-link'>Site Profiling</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="layout-rtl.html" class='submenu-link'>Manpower Profiling</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="menu-item  has-sub">
                            <a href="#" class='menu-link'>
                                <span><i class="bi bi-file-earmark-medical-fill"></i> Stock Monitoring Management</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">
                                    <ul class="submenu-group">
                                        <li class="submenu-item">
                                            <a href="#" class='submenu-link'>Stock list (level)</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="content-wrapper container mt-5">
            <div class="page-heading">
                @yield('page-heading')
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
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
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
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
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
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
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
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
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
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
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
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
                    </div>
                </section> {{-- end of section --}}
            </div>
        </div>

        <footer>
            <div class="container">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
    

    {{-- JavaScript --}}
    <script src="{{ URL::asset('new-assets/extensions/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/static/js/components/dark.js')}}"></script>
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