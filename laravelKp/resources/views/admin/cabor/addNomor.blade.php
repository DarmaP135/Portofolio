@extends('admin.layout.index')
@section('container')

<h3 class="card-title text-center mb-5">Form Input Nomor Lomba</h3>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" id="add">
            <div class="card-body">
                <a href="{{route('detailCabor',[$olahraga->id])}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form method="post" class="mt-3" action="{{route('postNomor')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Cabang Olahraga</label>
                        <input class="form-control" type="text" value="{{$olahraga->id}}" name="olahraga_id" hidden>
                        <input class="form-control" type="text" value="{{$olahraga->nama}}" readonly disabled>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width:100%">Tambah Nomor Lomba</th>
                                    <th>
                                        <div class="form-group mb-3">
                                            <label></label>
                                            <a href="javascript::void(0)" class="addRow btn btn-gradient-light" style="float:right;">+</a>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label>Nomor Lomba</label>
                                            <input type="text" class="form-control" style="text-transform:capitalize;" placeholder="Ex. Tunggal Putra" name="nomor[]">
                                        </div>
                                    </td>
                                    <th>
                                        <div class="form-group mb-3">
                                            <label></label>
                                            <a href="javascript::void(0)" class="deleteRow btn btn-danger" style="float:right;">-</a>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <center><button type="submit" class="btn btn-info mt-3">Submit</button></center>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection