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
                <div class="form-group row">
                    <label for="usia" class="col-md-4 col-form-label text-md-right">Status Pasien</label>
                    <div class="col-md-6">
                        <span style="width:50%;">
                            <input type="radio" class="radio-baru" id="baru" name="status"  required> Baru
                            <input type="radio" class="radio-baru" id="lama" name="status" required> Lama
                        </span>
                    </div>
                </div>
                    <form action="" id="new" method="post" style="display:none;">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="klinik" class="col-md-4 col-form-label text-md-right">Nama Pasien</label>
                            <div class="col-md-6">
                                <select name="pasien" class="form-control">
                                    @foreach($pasien as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <center>
                            <button class="btn btn-primary">Submit</button>
                        </center>
                    </form>
                    <form action="" method="POST" id="old" style="display:none;">
                    {{csrf_field()}}
                            <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Pasien</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nama" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="klinik" class="col-md-4 col-form-label text-md-right">Poliklinik</label>
                                <div class="col-md-6">
                                    <select name="klinik" class="form-control">
                                        @foreach($poliklinik as $klinik)
                                            <option value="{{ $klinik->id }}">{{ $klinik->klinik }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
                                <div class="col-md-6">
                                    <textarea name="alamat" cols="30" rows="2" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="usia" class="col-md-4 col-form-label text-md-right">Usia</label>
                                <div class="col-md-6">
                                    <input type="number" name="usia" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telpon" class="col-md-4 col-form-label text-md-right">Telpon(+62)</label>
                                <div class="col-md-6">
                                    <input type="number" name="telpon" class="form-control">
                                </div>
                            </div>

                        <center>
                            <button class="btn btn-primary">Submit</button>
                        </center>

                    </form>
                    <script type="text/javascript">
                    $(document).ready(function(){
                        $('#baru').change(function(){
                            if ($('#baru').is(':checked')) {
                                $('#new').hide();
                                $('#old').show();
                            }
                        });

                        $('#lama').change(function(){
                            if ($('#lama').is(':checked')) {
                                $('#old').hide();
                                $('#new').show();
                            }
                        });
                    
                    });
            </script>

                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <tr>
                                <th>#</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal Daftar</th>
                                <th>klinik</th>
                                <th>Aksi</th>
                            </tr>
                            <tbody>
                                @foreach($pasien as $row)
                                <tr>
                                    <td>#</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->created_at->diffForHumans() }}</td>
                                    <td>{{ $row->poliklinik->klinik }}</td>
                                    <td>
                                        <form action="{{ route('del-pasien',$row->id) }}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <a href="{{ route('ed-pasien',$row->id) }}" class="btn btn-success">
                                                Edit
                                            </a>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $row->id }}">
                                            Detail
                                            </button>
                                            <button class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Pasien</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <b>Nama : </b> {{ $row->nama }}<br>
                                        <b>Alamat : </b> {{ $row->alamat }}<br>
                                        <b>Klinik : </b> {{ $row->poliklinik->klinik }}<br>
                                        <b>Telpon : </b> (+62) {{ $row->telpon }}<br>
                                        <b>Usia :</b> {{ $row->usia }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
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
