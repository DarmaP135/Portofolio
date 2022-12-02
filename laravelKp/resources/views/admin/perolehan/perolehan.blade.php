@extends('admin.layout.index')
@section('container')

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-info text-white me-2">
            <i class="mdi mdi-flag-checkered"></i>
        </span>Perolehan Medali {{$acara->nama}}
    </h3>
</div>
@role('admin')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <a href="{{route('perolehan')}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form action="/perolehanMedali/{{$acara->id}}">
                    <div class="table-responsive">
                        <table class="table">
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
                                        <button type="submit" class="add btn btn-gradient-info font-weight-bold">Search</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th> Nama Event </th>
                                <th> Nama Atlet </th>
                                <th> Cabang Olahraga </th>
                                <th> Nomor </th>
                                <th> Medali </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($medali as $post)
                            <tr>
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
                                <td> <a href="{{route('editMedali', [$post->id])}}"><span style="color:green; font-size:18px;"><i class="mdi mdi-square-edit-outline me-0"></i></span></a>
                                    <a href="#" data-link="{{ route('hapusMedali', [$post->id]) }}" class="deleteMedali" data-nama="{{$post->atlet->nama}}"><span style=" color:red; font-size:18px;"><i class="mdi mdi-delete-sweep-outline"></i></span></a>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data belum Tersedia.
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    {{$medali->links()}}
                </div>
            </div>
        </div>

        <a href="{{route('addMedali',[$acara->id])}}" type="button" class="btn btn-info font-weight-bold mt-4" style="float:right;">+ Input</a>
    </div>

    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Total Medali</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> Medali </th>
                                <th> Jumlah </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> Emas </td>
                                <td> {{$emas}} </td>
                            </tr>
                            <tr>
                                <td> Perak </td>
                                <td> {{$perak}} </td>

                            </tr>
                            <tr>
                                <td> Perunggu </td>
                                <td> {{$perunggu}} </td>

                            </tr>
                            <tr>
                                <td> <b>Total</b> </td>
                                <td> <b>{{$total}}</b> </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole

@role('operator')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <a href="{{route('perolehan1')}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form action="/PerolehanMedali/{{$acara->id}}">
                    <div class="table-responsive">
                        <table class="table">
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
                                        <button type="submit" class="add btn btn-gradient-info font-weight-bold">Search</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th> Nama Event </th>
                                <th> Nama Atlet </th>
                                <th> Cabang Olahraga </th>
                                <th> Nomor </th>
                                <th> Medali </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($medali as $post)
                            <tr>
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
                                <td> <a href="{{route('editMedali1', [$post->id])}}"><span style="color:green; font-size:18px;"><i class="mdi mdi-square-edit-outline me-0"></i></span></a>
                                    <a href="#" data-link="{{ route('hapusMedali1', [$post->id]) }}" class="deleteMedali" data-nama="{{$post->atlet->nama}}"><span style=" color:red; font-size:18px;"><i class="mdi mdi-delete-sweep-outline"></i></span></a>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data belum Tersedia.
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    {{$medali->links()}}
                </div>
            </div>
        </div>

        <a href="{{route('addMedali1',[$acara->id])}}" type="button" class="btn btn-info font-weight-bold mt-4" style="float:right;">+ Input</a>
    </div>

    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Total Medali</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> Medali </th>
                                <th> Jumlah </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> Emas </td>
                                <td> {{$emas}} </td>
                            </tr>
                            <tr>
                                <td> Perak </td>
                                <td> {{$perak}} </td>

                            </tr>
                            <tr>
                                <td> Perunggu </td>
                                <td> {{$perunggu}} </td>

                            </tr>
                            <tr>
                                <td> <b>Total</b> </td>
                                <td> <b>{{$total}}</b> </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole








@endsection
@push('javascript-internal')
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
@endpush