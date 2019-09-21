@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Dokter Info</div>

                <div class="card-body">
                    <form action="" method="POST">
                    {{csrf_field()}}
                    <div class="form-group row">
                            <label for="klinik" class="col-md-4 col-form-label text-md-right">Nama Dokter</label>
                            <div class="col-md-6">
                                <input type="text" value="{{ $dokter->name }}" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="klinik" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" value="{{ $dokter->email }}" name="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="klinik" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control"  name="password">
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
