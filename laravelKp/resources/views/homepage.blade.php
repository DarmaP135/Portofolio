<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- title -->
    <title>Perolehan Medali Atlet Kabupaten Badung</title>
    <!-- Icon -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/images/dashboard/logo.png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/css/home/bootstrap.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/home/magnific-popup.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/home/main1.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/home/responsive.css">

</head>

<body>
    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="#Home" class="navbar-brand">
                                <div class="brand-image">
                                    <img id="logo" src="assets/images/dashboard/logo.png" alt="">
                                </div>
                                <div class="brand-titles">
                                    <h6 class="brand-title">diskominfo</h6>
                                    <h6 class="brand-subtitle">kabupaten badung</h6>
                                </div>
                            </a>
                        </div>
                        <!-- logo -->
                        @role('operator')
                        <a href="{{ route('operator') }}" class="d-flex justify-content-end">
                            <div class="d-flex mt-3">
                                <span style="color: white; margin-right:10px; font-size:25px;"><i class="mdi mdi-account-circle"></i></span>
                            </div>
                            <div class="d-flex mt-4">
                                <p class="text-white" style="text-transform:capitalize; font-size:17px;">{{ Auth::user()->username }}</p>
                            </div>
                        </a>
                        @endrole
                        @role('admin')
                        <a href="{{ route('admin') }}" class="d-flex justify-content-end">
                            <div class="d-flex mt-3">
                                <span style="color: white; margin-right:10px; font-size:25px;"><i class="mdi mdi-account-circle"></i></span>
                            </div>
                            <div class="d-flex mt-4">
                                <p class="text-white" style="text-transform:capitalize; font-size:17px;">{{ Auth::user()->username }}</p>
                            </div>
                        </a>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- hero area -->
    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Koni Kabupaten Badung</p>
                            <h2>Perolehan Medali Atlet <br>Kabupaten Badung</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->

    <!-- hero area -->
    <div class="product-section pt-100  pb-50" id="perolehan">
        <div class="container">
            <div class=" row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Perolehan Medali Atlet</h3>
                    </div>
                </div>
            </div>
            <div class="list-section pt-80 pb-80">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title mb-5">
                        <h4>Daftar Kegiatan / Acara</h4>
                    </div>
                    <div class="row">
                        @forelse($acara as $event)
                        <center class="col-sm-6 col-md-4 col-lg-3">
                            <a class="btn btn-gradient-danger" id="acara" href="{{route('homemedali',[$event->id])}}"> {{$event->nama}}</a>
                        </center>
                        @empty
                        <div class="alert alert-danger">
                            Data Tidak Tersedia.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->



    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="text-center">
                <p>Copyrights &copy; 2022 - Pemerintah Kabupaten Badung. All rights reserved.</p>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <!-- jquery -->
    <script src="assets/js/home/jquery-1.11.3.min.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/home/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/home/jquery.magnific-popup.min.js"></script>
    <!-- sticker js -->
    <script src="assets/js/home/sticker.js"></script>
    <!-- main js -->
    <script src="assets/js/home/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#atlet').select2({
                allowClear: true,
                ajax: {
                    url: "{{ route('search-select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        });
        $(document).ready(function() {
            $('#Olga').select2({
                allowClear: true,
                ajax: {
                    url: "{{ route('olahraga.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

            $('#Olga').change(function() {
                //clear select
                $('#Nocabor').empty();
                //set id
                let provinceID = $(this).val();
                if (provinceID) {
                    $('#Nocabor').select2({
                        allowClear: true,
                        ajax: {
                            url: "{{ route('nomor.select') }}?provinceID=" + provinceID,
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            text: item.nomor,
                                            id: item.id
                                        }
                                    })
                                };
                            }
                        }
                    });
                } else {
                    $('#Nocabor').empty();
                }
            });

            // EVENT ON CLEAR
            $('#Olga').on('select2:clear', function(e) {
                $("#Nocabor").select2();
            });
        });
    </script>
</body>


</html>