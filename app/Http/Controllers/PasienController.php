<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Poliklinik;
use Illuminate\Http\Request;

class PasienController extends Controller
{

    public function index()
    {
        $poliklinik = Poliklinik::orderBy('klinik','ASC')->get();
        $pasien = Pasien::orderBy('id','DESC')->get();
        return view('panel.pasien.data',compact('pasien','poliklinik'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'klinik' => 'required',
            'alamat' => 'required',
            'usia' => 'required'
        ]);

        $pasien = new Pasien;
        $pasien->create([
            'nama' => $request->nama,
            'poliklinik_id' => $request->klinik,
            'alamat' => $request->alamat,
            'telpon' => $request->telpon,
            'usia' => $request->usia,
        ]);        

        return redirect()->back()->with('sukses-add','sukses menambah data');
    }

    public function edit($id)
    {
        $poliklinik = Poliklinik::orderBy('klinik','ASC')->get();
        $pasien = Pasien::findorFail($id);
        return view('panel.pasien.edit',compact('pasien','poliklinik'));
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);
        $pasien->nama = $request->nama;
        $pasien->poliklinik_id = $request->klinik;
        $pasien->alamat = $request->alamat;
        $pasien->telpon = $request->telpon;
        $pasien->usia  = $request->usia;
        
        $pasien->save();
        return redirect()->route('pasien')->with('sukses-upd','sukses mengedit data');
    }

    public function destroy($id)
    {
        //
    }
}
