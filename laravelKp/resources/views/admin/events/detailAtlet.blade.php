@extends('admin.layout.index')
@section('container')

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-info text-white me-2">
            <i class="mdi mdi-account-group"></i>
        </span>Daftar Atlet Event {{$acara->nama}}
    </h3>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <a href="{{route('event')}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Atlet </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($atlet as $post)
                            <tr>
                                <td> {{++$i}} </td>
                                <td> {{$post->nama}} </td>
                                <td>
                                    <a href="{{route('editAtlet', [$post->id])}}"><span style="color:green; font-size:18px;"><i class="mdi mdi-square-edit-outline me-0"></i></span></a>
                                    <a href="#" data-ro="{{route('hapusAtlet', [$post->id])}}" class="delete" data-id="{{$post->id}}" data-nama="{{$post->nama}}"><span style=" color:red; font-size:18px;"><i class="mdi mdi-delete-sweep-outline me-1"></i></span></a>
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
<a href="{{route('addAtlet',[$acara->id])}}" type="button" class="btn btn-info font-weight-bold" style="float:right;">+ Input</a>
{{ $atlet->links() }}
@endsection