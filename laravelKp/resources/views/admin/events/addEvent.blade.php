@extends('admin.layout.index')
@section('container')

<h3 class="card-title text-center mb-5">Form Input Events</h3>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" id="add">
            <div class="card-body">
                <a href="{{route('event')}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form class="mt-3" action="{{route('postevent')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Event</label>
                        <input type="text" class="form-control @error('image') is-invalid @enderror" name="nama" placeholder="Nama Event">
                        @error('image')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="month" name="tahun" class="form-control" multiple>
                    </div>
                    <center><button type="submit" class="btn btn-info mt-3">Submit</button></center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection