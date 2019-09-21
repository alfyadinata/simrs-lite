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
                <div class="card-header">List Pasien</div>

                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <tr>
                                <th>#</th>
                                <th>Nama Pasien</th>
                                <th>Telpon</th>
                                <th>Usia</th>
                            </tr>
                            <tbody>
                                @foreach($pasien as $row)
                                <tr>
                                    <td>#</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->telpon }}</td>
                                    <td>{{ $row->usia }}</td>
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
