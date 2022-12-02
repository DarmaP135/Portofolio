<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
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

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-10 p-t-100">
                        Login
                    </span>


                    <div class="mb-3">
                        <label for="username" class="form-label p-l-40 p-b-10"><b>Username</b></label>
                        <x-jet-input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" id="username" placeholder="Masukkan Username" type="text" name="username" :value="old('username')" required />
                        <x-jet-input-error for="username"></x-jet-input-error>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label p-l-40 p-b-10"><b>Password</b></label>
                        <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Masukkan Password" type=" password" name="password" required autocomplete="current-password" />
                        <x-jet-input-error for="password"></x-jet-input-error>

                        <!-- @if (Route::has('password.request'))
                        <a class="text-muted me-3" href="{{ route('password.request') }}" style="margin-left: 50px;">
                            Lupa Password?
                        </a>
                        @endif -->
                    </div>

                    <div class="container-login100-form-btn p-t-13">

                        <x-jet-button class="login100-form-btn">
                            Login
                        </x-jet-button>
                    </div>
                    <div class="text-center p-t-10">
                        <span class="txt2">
                            <a href="{{ route('register') }}"><b>Registrasi</b></a>
                        </span>
                    </div>
                </form>

                <div class="login100-more">
                    <div class="container">
                        <p class="p-t-120 text-center"><img src="assets/images/dashboard/logo.png" style="width: 380px;"></p>
                        <div class="text-center p-t-20" style="font-size: 30px;"><b>DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN BADUNG</b></div>
                        <div class="text-center p-t-20" style="font-size: 20px;"><b>Sistem Pemantauan Perolehan Medali</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Javascript -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- End Javascript -->

</body>

</html>