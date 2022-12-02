@extends('admin.layout.index')
@section('container')

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-info text-white me-2">
            <i class="mdi mdi-flag-checkered"></i>
        </span>Total Medali {{$acara->nama}}
    </h3>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <a href="{{route('perolehan')}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th> Nama Event </th>
                                <th> Kontingen </th>
                                <th> Emas </th>
                                <th> Perak </th>
                                <th> Perunggu </th>
                                <th> Total </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($total as $post)
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> {{ $post->emas }} </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> <a href="{{route('editMedali', [$post->id])}}"><span style="color:green; font-size:18px;"><i class="mdi mdi-square-edit-outline me-0"></i></span></a>
                                    <a href="{{ route('hapusMedali', [$post->id]) }}"><span style=" color:red; font-size:18px;"><i class="mdi mdi-delete-sweep-outline"></i></span></a>
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
            </div>
        </div>
    </div>
</div>

<a href="#" type="button" class="btn btn-info font-weight-bold" style="float:right;">+ Input</a>


@include('sweetalert::alert')

@endsection