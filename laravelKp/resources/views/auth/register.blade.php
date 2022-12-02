<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>
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
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title p-b-10">
                        Daftar
                    </span>

                    <div class="mb-3 mt-3">
                        <label for="username" class="form-label p-l-40 p-b-10"><b>Username</b></label>
                        <x-jet-input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" :value="old('username')" id="username" placeholder="Masukkan Username" required autofocus autocomplete="username" />
                        <x-jet-input-error for="username" class="invalid-feedback p-l-40"></x-jet-input-error>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label p-l-40 p-b-10"><b>Password</b></label>
                        <x-jet-input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" placeholder="Masukkan Password" required autocomplete="new-password" />
                        <x-jet-input-error for="password" class="invalid-feedback p-l-40"></x-jet-input-error>
                    </div>

                    <div class="mb-3">
                        <label for="konfirmasi_password" class="form-label p-l-40 p-b-10"><b>Konfirmasi
                                Password</b></label>
                        <x-jet-input class="form-control" id="konfirmasi_password" placeholder="Konfirmasi Password" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label p-l-40 p-b-10"><b>Daftar Sebagai</b></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="daftar_sebagai" id="admin" value="admin" style="margin-left: 40px;" required>
                            <label class="form-check-label" for="admin" style="margin-top: 10px;"> &nbsp Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="daftar_sebagai" id="operator" value="operator" style="margin-left: 40px;" required>
                            <label class="form-check-label" for="operator" style="margin-top: 10px;"> &nbsp Operator</label>
                        </div>
                    </div>


                    <div class="container-login100-form-btn p-t-13">
                        {{-- <button class="login100-form-btn">
                            Daftar
                        </button> --}}
                        <x-jet-button class="login100-form-btn">
                            Daftar
                        </x-jet-button>
                    </div>
                    <div class="text-center p-t-10">
                        <span class="txt2">
                            <a href="{{ route('login') }}"><b>Login</b></a>
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