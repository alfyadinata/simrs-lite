<?php

namespace App\Http\Controllers;

use App\Poliklinik;
use App\User;
use Illuminate\Http\Request;

class PoliklinikController extends Controller
{
    public function index()
    {
        $users = User::where('role',0)->orderBy('id','DESC')->get();
        $klinik = Poliklinik::orderBy('id','DESC')->get();
        return view('panel.klinik.data',compact('users','klinik'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $klinik = new Poliklinik;
        $klinik->create([
            'klinik' => $request->klinik,
            'user_id' => $request->dokter,
        ]);

        return redirect()->back()->with('sukses-add','sukses membuat data');

    }

    public function edit($id)
    {
        $klinik = Poliklinik::findOrFail($id);
        $dokter = $klinik->user_id;
        $user =User::where('id',$dokter)->first();
        return view('panel.klinik.edit',compact('klinik','user'));
    }

    public function update(Request $request, $id)
    {
        $klinik = Poliklinik::find($id);
        $klinik->klinik = $request->klinik;
        $klinik->save();
        return redirect()->route('klinik')->with('sukses-upd','sukses edit data');
    }

    public function destroy($id)
    {
        $klinik = Poliklinik::find($id);
        if ($klinik) {
            $klinik->delete();
        }
        return redirect()->back()->with('sukses-del','sukses menghapus');
    }
}
