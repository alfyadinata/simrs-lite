@extends('layouts.app')

@section('content')
@if(session()->has('sukses-add'))
<script>alert('sukses menambah data');</script>
@endif
@if(session()->has('sukses-upd'))
<script>alert('sukses mengedit data');</script>
@endif
@if(session()->has('sukses-del'))
<script>alert('sukses menghapus data');</script>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dokter</div>

                <div class="card-body">
                    <form action="" method="POST">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Dokter</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" required autofocus>
                                @if($errors->has('name'))
                                    <strong>{{ $errors->first('name') }}</strong>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email">
                                @if($errors->has('email'))
                                    <strong>{{ $errors->first('email') }}</strong>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                                @if($errors->has('password'))
                                    <strong>{{ $errors->first('password') }}</strong>
                                @endif
                            </div>
                        </div>

                        <center>
                            <button class="btn btn-primary">Submit</button>
                        </center>

                    </form>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <tr>
                                <th>#</th>
                                <th>Nama Dokter</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                            <tbody>
                                @foreach($users as $row)
                                <tr>
                                    <td>#</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        <form action="{{ route('del-dokter',$row->id) }}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <a href="{{ route('ed-dokter',$row->id) }}" class="btn btn-success">
                                                Edit
                                            </a>
                                            <button class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
