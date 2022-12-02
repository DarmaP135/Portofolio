<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- title -->
    <title>Perolehan Medali Atlet Kabupaten Badung</title>
    <!-- Icon -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <!-- favicon -->
    <link rel="shortcut icon" type="{{ URL::asset('image/png" href="assets/images/dashboard/logo.png')}}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/home/bootstrap.min.css')}}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/home/magnific-popup.css')}}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/home/main1.css')}}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/home/responsive.css')}}">
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/dashboard/logo.png') }}" />

</head>

<body>
    <!-- header -->
    <div class="top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="/" class="navbar-brand">
                                <div class="brand-image">
                                    <img id="logo" src="{{ URL::asset('assets/images/dashboard/logo.png')}}" alt="">
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
    <div class="product-section pt-150 pb-50">
        <div class="container">
            <div class=" row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Perolehan Medali {{$acara->nama}}</h3>
                    </div>
                </div>
            </div>

            <div class="cart-section mb-150">
                <div class="container">
                    <div class="row">
                        <form action="/Medali/{{$acara->id}}" class="d-flex justify-content-center">
                            <div class="col-lg-12 col-md-12 mb-5">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th width="300px"> Nama Atlet </th>
                                            <th width="200px"> Olahraga </th>
                                            <th width="200px"> Nomor Lomba </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <select id="atlet" name="atlet" placeholder="Search..." class="form-control form-control-sm">
                                                </select>
                                            </td>
                                            <td> <select id="Olga" name="olahraga" placeholder="Search..." class="form-control form-control-sm">
                                                </select>
                                            </td>
                                            <td> <select id="Nocabor" name="nomor" placeholder="Search..." class="form-control form-control-sm">
                                                </select>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-gradient-danger">Search</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <div class="col-lg-12 col-md-12">
                            <div class="cart-table-wrap">
                                <table class="cart-table">
                                    <thead class="cart-table-head">
                                        <tr class="table-head-row">
                                            <th> Nama Event </th>
                                            <th> Nama Atlet </th>
                                            <th> Cabang Olahraga </th>
                                            <th> Nomor </th>
                                            <th> Medali </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($medali as $post)
                                        <tr class="table-body-row">
                                            <td> {{ $post->Kegiatan->nama }} </td>
                                            <td> {{ $post->atlet->nama }} </td>
                                            <td> {{ $post->olga->nama }} </td>
                                            <td> @if ($post->nomor)
                                                {{$post->nomor->nomor}}
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td> {{ $post->medali }} </td>
                                        </tr>
                                        @empty
                                        <div class="alert alert-danger">
                                            Data belum Tersedia.
                                        </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4"> {{$medali->links()}} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->

    <!-- hero area -->
    <div class="list-section pt-80 pb-80" id="total">
        <div class="container">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>Total Perolehan Medali</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th> Emas </th>
                                    <th> Perak </th>
                                    <th> Perunggu </th>
                                    <th> Total </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-body-row">
                                    <td>{{$emas}}</td>
                                    <td>{{$perak}}</td>
                                    <td>{{$perunggu}}</td>
                                    <td>{{$total}}</td>
                                </tr>
                            </tbody>
                        </table>
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
    <script src="{{ URL::asset('assets/js/home/jquery-1.11.3.min.js')}}"></script>
    <!-- owl carousel -->
    <script src="{{ URL::asset('assets/js/home/owl.carousel.min.js')}}"></script>
    <!-- magnific popup -->
    <script src="{{ URL::asset('assets/js/home/jquery.magnific-popup.min.js')}}"></script>
    <!-- sticker js -->
    <script src="{{ URL::asset('assets/js/home/sticker.js')}}"></script>
    <!-- main js -->
    <script src="{{ URL::asset('assets/js/home/main.js')}}"></script>

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
                let olahraga = $(this).val();
                if (olahraga) {
                    $('#Nocabor').select2({
                        allowClear: true,
                        ajax: {
                            url: "{{ route('nomor.select') }}?olahraga=" + olahraga,
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