@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Poliklinik</div>

                <div class="card-body">
                    <form action="" method="POST">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <label for="klinik" class="col-md-4 col-form-label text-md-right">Nama Poliklinik</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="klinik" value="{{ $klinik->klinik }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="klinik" class="col-md-4 col-form-label text-md-right">Dokter</label>
                            <div class="col-md-6">
                                <select name="dokter" class="form-control">
                                    <option value="{{ $klinik->user_id }}">                                    
                                        {{ $user->name }}
                                        </option>
                                </select> 
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
