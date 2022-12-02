@extends('admin.layout.index')
@section('container')

<h3 class="card-title text-center mb-5">Form Input Events</h3>

@role('admin')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" id="add">
            <div class="card-body">
                <a href="{{route('medali',[$acara->id])}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form action="{{route('postMedali')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nama Event</label>
                            <input id="test" class="form-control" name="event" value="{{$acara->id}}" hidden />
                            <input class="form-control form-control-sm" value="{{$acara->nama}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Nama Atlet
                        </label>
                        <select id="atlet" name="atlet[]" data-placeholder="Select" class="form-control form-control-sm" multiple>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Cabang Olahraga
                        </label>
                        <select id="Olga" name="olahraga" data-placeholder="Select" class="form-control form-control-sm">
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Nomor Lomba
                        </label>
                        <select id="Nocabor" name="nomor" data-placeholder="Select" class="form-control form-control-sm">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Medali</label>
                        <select class="form-select" name="medali">
                            <option selected disabled>- Medali -</option>
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
@endrole

@role('operator')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" id="add">
            <div class="card-body">
                <a href="{{route('medali1',[$acara->id])}}" class="btn btn-sm btn-secondary mb-4"><span class=" mdi mdi-arrow-left-bold-circle"></span></a>
                <form action="{{route('postMedali1')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nama Event</label>
                            <input class="form-control" name="event" id="test" value="{{$acara->id}}" hidden>
                            <input class="form-control form-control-sm" value="{{$acara->nama}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Nama Atlet
                        </label>
                        <select id="atlet" name="atlet[]" data-placeholder="Select" class="form-control select2" multiple>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Cabang Olahraga
                        </label>
                        <select id="Olga" name="olahraga" data-placeholder="Select" class="form-control form-control-sm">
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Nomor Lomba
                        </label>
                        <select id="Nocabor" name="nomor" data-placeholder="Select" class="form-control form-control-sm">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Medali</label>
                        <select class="form-select" name="medali">
                            <option selected disabled>- Medali -</option>
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
@endrole

@endsection


@push('javascript-internal')
<script>
    $(document).ready(function() {
        let inputVal = document.getElementById("test").value;
        if (inputVal) {
            $('#atlet').select2({
                allowClear: true,
                ajax: {
                    url: "{{ route('atlet.select') }}?inputVal=" + inputVal,
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
        }

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
            let olahraga = $(this).val();
            if (olahraga) {
                $('#Nocabor').select2({
                    allowClear: true,
                    ajax: {
                        url: "{{ route('nomor.select') }}?olahraga=" + olahraga,
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