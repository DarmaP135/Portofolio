@extends('operator.layout.index')
@section('container')
<h3 class="card-title text-center mb-5">Form Perolehan Medali </h3>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card" style="border-radius: 37px; box-shadow: 0px 9px 10px rgba(0, 0, 0, 0.1);">
            <form method="post" action="{{ route('updatebiodata') }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div style="margin-left: 5%; margin-right: 5%; margin-top: 65px; padding-bottom: 150px;">
                    <div class="mb-4">
                        <label for="exampleInputNama1" class="form-label"><b>Username</b></label>
                        <input style="width:100%; height:43px;" type="text" class="form-control" id="exampleInputNama1" placeholder="Nama Lengkap" value="{{ Auth::user()->username }}" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label"><b>Email</b></label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputfirstname" class="form-label"><b>Nama</b></label>
                        <input name="firstname" type="text" class="form-control" id="exampleInputfirstname" placeholder="Nama" value="{{ Auth::user()->firtsname }}">
                    </div>
                    <button type="submit" class="btn" style="width: 176px; height: 48px; background: #151E17; border-radius: 33px; color:whitesmoke;">Simpan</button>
                </div>
            </form>


        </div>
    </div>
</div>
</div>
@endsection