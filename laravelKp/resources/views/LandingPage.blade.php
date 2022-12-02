<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/dashboard/logo.png" />

</head>

<body>
    <div class="container">
        <div class="items-center">
            <p class="p-t-80 text-center"><img src="assets/images/dashboard/logo.png" style="width: 150px;"></p>
            <div class="text-center p-t-20">
                <h3 class="mb-3">DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN BADUNG</h3>
                <h6 class="mb-3">Sistem Pemantauan Perolehan Medali</h6>
            </div>
            @auth
            <div class="conteiner">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                @role('admin')
                <center><a href="{{ route('admin') }}" class="btn btn-info mt-4" type="button" style="text-transform:capitalize;">Dashboard {{ Auth::user()->username }}</a></center>
                <center><a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();" class="btn btn-dark mb-4 mt-4" type="button">Logout</a></center>
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
                @endrole
                @role('operator')
                <center><a href="{{ route('operator') }}" class="btn btn-info mt-4" type="button" style="text-transform:capitalize;">Dashboard {{ Auth::user()->username }}</a></center>
                <center><a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();" class="btn btn-dark mb-4 mt-4" type="button">Logout</a></center>
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
                @endrole
                @else
                @endif
            </div>
            @else
            <center><a href="{{ route('login') }}" class="btn btn-info mb-4" type="button">Login</a></center>
            <center><a href="{{ route('register') }}" class="btn btn-info mb-4" type="button">Registrasi</a></center>
            @endauth
        </div>
    </div>




    <!-- Javascript -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- End Javascript -->

</body>

</html>