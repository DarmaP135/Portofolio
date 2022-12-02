@extends('admin.layout.index')
@section('container')

<h3 class="card-title text-center mb-5">Form Edit Cabang Olahraga</h3>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" id="add">
            <div class="card-body">
                <a href="{{route('olahraga')}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form method="post" class="mt-3" action="{{route('updateCabor',[$cabor->id])}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Cabang Olahraga</label>
                        <input type="text" class="form-control mt-2" placeholder="Nama Olahraga" name="olahraga" value="{{$cabor->nama}}">
                    </div>
                    <center><button type="submit" class="btn btn-info mt-5">Simpan</button></center>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
    $('thead').on('click', '.addRow', function() {
        var tr = "<tr>" +
            "<td>" +
            "<div class='form-group'>" +
            "<label>Nomor Lomba</label>" +
            "<input type='text' class='form-control' placeholder='Ex. Tunggal Putra' name='nomor[]'>" +
            "</div>" +
            "</td>" +
            "<td>" +
            "<div class='form-group mb-3'>" +
            "<label></label>" +
            "<a href='javascript::void(0)' class='deleteRow btn btn-danger' style='float:right;'>-</a>" +
            "</div>" +
            "</td>" +
            "</tr>"
        $('tbody').append(tr);
    });

    $('tbody').on('click', '.deleteRow', function() {
        $(this).parent().parent().parent().remove();
    });
</script>
@endsection