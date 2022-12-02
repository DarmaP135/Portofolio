@extends('admin.layout.index')
@section('container')

<h3 class="card-title text-center mb-5">Form Input Cabang Olahraga</h3>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" id="add">

            <div class="card-body">
                <a href="{{route('olahraga')}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form method="post" class="mt-3" action="{{route('postCabor')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Cabang Olahraga</label>
                        <input type="text" class="form-control mt-2" style="text-transform:capitalize;" placeholder="Nama Olahraga" name="olahraga">
                    </div>
                    <center><button type="submit" class="btn btn-info mt-5">Submit</button></center>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection