<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Perolehan Medali</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/dashboard/logo.png') }}" />



</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img src="{{ URL::asset('assets/images/dashboard/logo.png') }}" alt="logo" style="width: 30px;" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="d-none d-md-block mt-4">
                    <p><b>Sistem Pemantauan Perolehan Medali Badung</b></p>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img mb-1">
                                <i class="mdi mdi-account"></i>
                            </div>
                            <div class="nav-profile-text mt-3 ms-1">
                                <p class="text-black" style="text-transform:capitalize;">{{ Auth::user()->username }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            @role('operator')
                            <a class="dropdown-item" href="{{route('biodata')}}">
                                <i class="mdi mdi-account me-2 text-success"></i> Biodata </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="mdi mdi-logout me-2 text-primary"></i> Logut </a>
                            @endrole
                            @role('admin')
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="mdi mdi-logout me-2 text-primary"></i> Logout </a>
                            @endrole
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="{{route('home')}}" class="nav-link">
                            <div style="text-align:center;" class="ms-4">
                                <img src="{{ URL::asset('assets/images/dashboard/logo.png') }}" style="width:100px;">
                                <p>DISKOMINFO<br> KABUPATEN BADUNG</p>
                            </div>
                        </a>
                    </li>
                    @role('admin')
                    <li class="nav-item {{ Request::is('HomeAdmin') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('admin')}}">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('event*' , 'event/AddEvent*') ? 'active' : '' }}">
                        <a class="nav-link" data-bs-toggle="collapse" href="#events" aria-expanded="false" aria-controls="events">
                            <span class="menu-title">Events</span>
                            <i class="mdi mdi-flag-checkered menu-icon"></i>
                        </a>
                        <div class="collapse" id="events">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ Request::is('event') ? 'active' : '' }} " href=" {{route('event')}}">Daftar Event</a></li>
                                <li class="nav-item"> <a class="nav-link {{ Request::is('event/AddEvent*') ? 'active' : '' }}" href="{{route('tambahEv')}}">Tambah Event</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ Request::is('olahraga*' , 'olahraga/Add*') ? 'active' : '' }}">
                        <a class="nav-link" data-bs-toggle="collapse" href="#olahraga" aria-expanded="false" aria-controls="olahraga">
                            <span class="menu-title">Cabang Olahraga</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                        <div class="collapse" id="olahraga">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link {{ Request::is('olahraga') ? 'active' : '' }}" href="{{route('olahraga')}}">Daftar Olahraga</a></li>
                                <li class="nav-item"> <a class="nav-link {{ Request::is('olahraga/Add*') ? 'active' : '' }}" href="{{route('addCabor')}}">Tambah Olahraga</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ Request::is('perolehanMedali*') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('perolehanMedali*') ? 'active' : '' }}" href="{{route('perolehan')}}">
                            <span class="menu-title">Perolehan Medali</span>
                            <i class="mdi mdi-podium-gold menu-icon"></i>
                        </a>
                    </li>
                    @endrole
                    @role('operator')
                    <li class="nav-item {{ Request::is('HomeOperator') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('operator')}}" alt="a">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('PerolehanMedali*') ? 'active' : '' }}">
                        <a class="nav-link" href=" {{route('perolehan1')}}">
                            <span class="menu-title">Perolehan Medali</span>
                            <i class="mdi mdi-podium-gold menu-icon"></i>
                        </a>
                    </li>
                    @endrole
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <x-jet-validation-errors class="mb-3 rounded-3" />

                    @yield('container')
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color: red; margin-left:45%;">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    Apakah anda yakin ingin keluar ? <br /><br /><br />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="margin-left:-500px; display: flex; flex-direction: row; justify-content: center; align-items: center; border: 1px solid #000000; box-sizing: border-box; border-radius: 10px; width: 219px; height: 60px;" data-bs-dismiss="modal">Batalkan</button>
                    <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();" style="display: flex; flex-direction: row; justify-content: center; align-items: center; width: 219px; background: #121814; border-radius: 10px; color: whitesmoke; height: 60px; ">Logout</a>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ URL::asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ URL::asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ URL::asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ URL::asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ URL::asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @stack('javascript-internal')
    @include('sweetalert::alert')

</body>
@yield('sweet')

</html>