<header class="mb-5 fixed-top">
    <div class="header-top ">
        <div class="container">
            <div class="logo">
                <a href="index.html">
					<img src="{{ URL::asset('new-assets/images/logo/logo.png')}}" alt="MSG" style="width: 8%; height: 10%;">
                </a>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown"
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
                <li class="menu-item">
                    <a href="{{ route('invetory-dashboard') }}" class='menu-link'>
                        <span><i class="bi bi-grid-fill"></i> Dashboard</span>
                    </a>
                </li>
                {{-- stock management --}}
                <li class="menu-item has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-stack"></i> Stock</span>
                    </a>
                    <div class="submenu">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item has-sub">
                                    <a href="#" class='submenu-link'>Manage Category</a>
                                    @include('mgs-inventory/inv-layout/category-management-submenu')
                                </li>
                                <li class="submenu-item has-sub">
                                    <a href="#" class='submenu-link'>Manage Supplier</a>
                                    @include('mgs-inventory/inv-layout/supplier-management-submenu')
                                </li>
                                <li class="submenu-item has-sub">
                                    <a href="#" class='submenu-link'>Manage Stock</a>
                                    @include('mgs-inventory/inv-layout/stock-management-submenu')
                                </li>
                                <li class="submenu-item has-sub">
                                    <a href="#" class='submenu-link'>Manage Stock Level</a>
                                    @include('mgs-inventory/inv-layout/stocklevel-management-submenu')
                                </li>
                            </ul>
                        </div>
                    </div>
                </li> {{-- end of stock management --}}

                {{-- Brand management --}}
                <li class="menu-item has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-tag"></i>Brand Management</span>
                    </a>
                    <div class="submenu ">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="">
                            <ul class="submenu-group">
                                <li class="submenu-item  ">
                                    <a href="#" class='submenu-link'>Brand List</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="#" class='submenu-link'>Create Brand</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li> {{-- end of Brand management --}}

                {{-- Project management --}}
                <li class="menu-item has-sub">
                    <a href="#" class='menu-link'>
                        <span><i class="bi bi-grid-1x2-fill"></i> Project Management</span>
                    </a>
                    <div class="submenu" @style(['max-width: 100%', 'min-width: 150%'])>
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="">
                            <ul class="submenu-group">
                                <li class="submenu-item">
                                    <a href="layout-default.html" class='submenu-link'>Request of Materials &
                                        Equipment</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="layout-vertical-1-column.html" class='submenu-link'>Transmital
                                        Monitoring</a>
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
                </li>{{-- End of project Management --}}
            </ul>
        </div>
    </nav>
</header>