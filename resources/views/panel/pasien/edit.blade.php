@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Pasien</div>

                <div class="card-body">
                    <form action="" method="POST">
                    {{csrf_field()}}
                       <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Pasien</label>
                                <div class="col-md-6">
                                    <input type="text" value="{{ $pasien->nama }}" class="form-control" name="nama" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="klinik" class="col-md-4 col-form-label text-md-right">Poliklinik</label>
                                <div class="col-md-6">
                                    <select name="klinik" class="form-control">
                                        @foreach($poliklinik as $klinik)
                                            <option value="{{ $klinik->id }}"
                                            @if($klinik->id == $pasien->poliklinik_id) @endif
                                            selected>
                                                {{ $klinik->klinik }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
                                <div class="col-md-6">
                                    <textarea name="alamat" cols="30" rows="2" class="form-control">{{ $pasien->alamat }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="usia" class="col-md-4 col-form-label text-md-right">Usia</label>
                                <div class="col-md-6">
                                    <input type="number" name="usia" class="form-control" value="{{ $pasien->usia }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telpon" class="col-md-4 col-form-label text-md-right">Telpon(+62)</label>
                                <div class="col-md-6">
                                    <input type="number" name="telpon" value="{{ $pasien->telpon }}" class="form-control">
                                </div>
                            </div>

                        <center>
                            <button class="btn btn-primary">Submit</button>
                        </center>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
