@extends('admin.layout.index')
@section('container')

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-info text-white me-2">
            <i class="mdi mdi-flag-checkered"></i>
        </span>Daftar Events
    </h3>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Event </th>
                                <th> Tahun </th>
                                <th> Jumlah Atlet </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                            <tr>
                                <td> {{++$i}} </td>
                                <td> {{ $post->nama }} </td>
                                <td> {{date('F Y', strtotime($post->tahun))  }} </td>
                                <td> {{ $post->atlet_count }} <a href="{{route('detailAtlet',[$post->id])}}">(detail)</a></td>
                                <td>
                                    <a href="{{ route('editevent', [$post->id]) }}"><span style=" color:green; font-size:18px;"><i class="mdi mdi-square-edit-outline"></i></span></a>
                                    <a href="#" data-link="{{ route('hapusevent', [$post->id]) }}" class="deleteEvent" data-nama="{{$post->nama}}"><span style=" color:red; font-size:18px;"><i class="mdi mdi-delete-sweep-outline"></i></span></a>
                                </td>
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
{{ $posts->links() }}
<a href="{{route('tambahEv')}}" type="button" class="btn btn-info font-weight-bold" style="float:right;">+ Input</a>


@endsection