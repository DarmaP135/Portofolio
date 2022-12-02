@extends('admin.layout.index')
@section('container')

<h3 class="card-title text-center mb-5">Form Edit Atlet</h3>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" id="add">
            <div class="card-body">
                <a href="{{route('detailCabor',[$nomor->Olga->id])}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form method="post" class="mt-3" action="{{route('updateNomor',[$nomor->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Atlet</label>
                        <input class="form-control" type="text" value="{{$nomor->nomor}}" name="nomor">
                    </div>
                    <center><button type="submit" class="btn btn-info mt-3">Edit</button></center>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection