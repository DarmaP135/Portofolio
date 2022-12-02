@extends('admin.layout.index')
@section('container')

<h3 class="card-title text-center mb-5">Form Input Events</h3>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" id="add">
            <div class="card-body">
                <a href="{{route('medali',[$perolehan->Kegiatan->id])}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form method="post" action="{{route('updateMedali', [$perolehan->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nama Event</label>
                            <input class="form-control" aria-label="Default select example" name="event" value="{{$perolehan->Kegiatan->id}}" hidden>
                            <input class="form-control form-control-sm" aria-label="Default select example" value="{{$perolehan->Kegiatan->nama}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Nama Atlet
                        </label>
                        <select id="atlet" name="atlet" data-placeholder="Select" class="form-control form-control-sm">
                            <option value="{{$perolehan->atlet->id}}">{{$perolehan->atlet->nama}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Cabang Olahraga
                        </label>
                        <select id="Olga" name="olahraga" data-placeholder="Select" class="form-control form-control-sm">
                            <option value="{{$perolehan->olga->id}}">{{$perolehan->olga->nama}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Nomor Lomba
                        </label>
                        <select id="Nocabor" name="nomor" data-placeholder="Select" class="form-control form-control-sm">
                            <option value="{{$perolehan->nomor->id}}">{{$perolehan->nomor->nomor}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Medali</label>
                        <select class="form-select" name="medali">
                            <option selected hidden>{{$perolehan->medali}}</option>
                            <option value="Emas">Emas</option>
                            <option value="Perak">Perak</option>
                            <option value="Perunggu">Perunggu</option>
                        </select>
                    </div>
                    <center><button type="submit" class="btn btn-info mt-4">Submit</button></center>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('javascript-internal')
<script>
    $(document).ready(function() {
        $('#atlet').select2({
            allowClear: true,
            ajax: {
                url: "{{ route('atlet.select') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
    });
    $(document).ready(function() {
        $('#Olga').select2({
            allowClear: true,
            ajax: {
                url: "{{ route('olahraga.select') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });

        $('#Olga').change(function() {
            //clear select
            $('#Nocabor').empty();
            //set id
            let provinceID = $(this).val();
            if (provinceID) {
                $('#Nocabor').select2({
                    allowClear: true,
                    ajax: {
                        url: "{{ route('nomor.select') }}?provinceID=" + provinceID,
                        dataType: 'json',
                        delay: 250,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.nomor,
                                        id: item.id
                                    }
                                })
                            };
                        }
                    }
                });
            } else {
                $('#Nocabor').empty();
            }
        });

        // EVENT ON CLEAR
        $('#Olga').on('select2:clear', function(e) {
            $("#Nocabor").select2();
        });


    });
</script>
@endpush