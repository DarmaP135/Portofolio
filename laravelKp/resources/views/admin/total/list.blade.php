@extends('admin.layout.index')
@section('container')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-info text-white me-2">
            <i class="mdi mdi-podium"></i>
        </span> Total Medali
    </h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Daftar Events/Kegiatan</h4>
                <div class="row">
                    @forelse($acara as $event)
                    <center class="col-sm-6 col-md-4 col-lg-3 mt-5">
                        <a class="btn btn-gradient-info" href="{{route('totalMedali',[$event->id])}}"> {{$event->nama}}</a>
                    </center>
                    @empty
                    <div class="alert alert-danger">
                        Data belum Tersedia.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection