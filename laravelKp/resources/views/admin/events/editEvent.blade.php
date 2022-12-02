@extends('admin.layout.index')
@section('container')

<h3 class="card-title text-center mb-5">Edit Events</h3>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" id="add">
            <div class="card-body">
                <a href="{{route('event')}}" class="btn btn-sm btn-secondary mb-5"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form class="mt-3" method="post" action="{{ route('updateevent',[$acara->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Event</label>
                        <input type="text" name="nama" class="form-control" value="{{ $acara->nama }}">
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="month" name="tahun" class="form-control" value="{{ $acara->tahun }}">
                    </div>
                    <center><button type="submit" class="btn btn-info mt-3">Simpan</button></center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection