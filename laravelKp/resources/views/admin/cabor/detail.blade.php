@extends('admin.layout.index')
@section('container')

<div class="page-header">
    <h3 class="page-title">
        Detail Cabang Olahraga {{$olahraga->nama}}
    </h3>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <a href="{{route('olahraga')}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nomor Lomba </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($nomor as $nocab)
                            <tr>
                                <td> {{++$i}} </td>
                                <td> {{$nocab->nomor}} </td>
                                <td>
                                    <a href="{{route('editNomor', [$nocab->id])}}"><span style="color:green; font-size:18px;"><i class="mdi mdi-square-edit-outline me-0"></i></span></a>
                                    <a href="#" data-ro="{{route('hapusNomor', [$nocab->id])}}" class="delete" data-id="{{$nocab->id}}" data-nama="{{$nocab->nomor}}"><span style=" color:red; font-size:18px;"><i class="mdi mdi-delete-sweep-outline me-1"></i></span></a>
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
<a href="{{route('addNomor',[$olahraga->id])}}" type="button" class="btn btn-info font-weight-bold" style="float:right;">+ Input</a>
{{ $nomor->links() }}
@endsection