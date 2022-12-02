@extends('operator.layout.index')
@section('container')

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-info text-white me-2">
            <i class="mdi mdi-home"></i>
        </span>Dashboard
    </h3>
</div>

<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <h4 class="mb-3">Jumlah Events <i class="mdi mdi-flag-checkered mdi-10px float-right"></i>
                </h4>
                <h3 class="font-weight-normal">{{$posts}}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <h4 class="mb-3">Jumlah Cabor <i class="mdi mdi-swim mdi-10px float-right"></i>
                </h4>
                <h3 class="font-weight-normal">{{$posts1}}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <h4 class="mb-3">Jumlah Nomor Lomba<i class="mdi mdi-wunderlist mdi-10px float-right"></i>
                </h4>
                <h3 class="font-weight-normal">{{$posts2}}</h3>
            </div>
        </div>
    </div>
</div>


@endsection