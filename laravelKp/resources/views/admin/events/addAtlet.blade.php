@extends('admin.layout.index')
@section('container')

<h3 class="card-title text-center mb-5">Form Input Atlet</h3>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" id="add">
            <div class="card-body">
                <a href="{{route('detailAtlet',[$acara->id])}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form method="post" class="mt-3" action="{{route('postAtlet')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Event</label>
                        <input class="form-control" type="text" value="{{$acara->id}}" name="acara_id" hidden>
                        <input class="form-control" type="text" value="{{$acara->nama}}" readonly disabled>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width:100%">Tambah Nama Atlet</th>
                                    <th>
                                        <div class="form-group mb-3">
                                            <label></label>
                                            <a href="javascript::void(0)" class="add btn btn-gradient-light" style="float:right;">+</a>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label>Nama Atlet</label>
                                            <input type="text" class="form-control" style="text-transform:capitalize;" placeholder="Masukkan Nama Atlet" name="nama[]">
                                        </div>
                                    </td>
                                    <th>
                                        <div class="form-group mb-3">
                                            <label></label>
                                            <a href="javascript::void(0)" class="deleteRow2 btn btn-danger" style="float:right;">-</a>
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