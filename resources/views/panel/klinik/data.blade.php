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
                <div class="card-header">Poliklinik</div>

                <div class="card-body">
                    <form action="" method="POST">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <label for="klinik" class="col-md-4 col-form-label text-md-right">Nama Poliklinik</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="klinik" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="klinik" class="col-md-4 col-form-label text-md-right">Dokter</label>
                            <div class="col-md-6">
                                <select name="dokter" class="form-control">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                                </select> 
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
                                <th>Klinik Yang Di Urus</th>
                                <th>Aksi</th>
                            </tr>
                            <tbody>
                                @foreach($klinik as $row)
                                <tr>
                                    <td>#</td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->klinik }}</td>
                                    <td>
                                        <form action="{{ route('del-klinik',$row->id) }}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <a href="{{ route('ed-klinik',$row->id) }}" class="btn btn-success">
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
