<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Poliklinik;
use App\Pasien;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function users()
    {
        $user = Auth::User()->id;
        $klinik = Poliklinik::where('user_id', $user)->first();
        $id = $klinik->id;
        // dd($id);
        $pasien  = Pasien::where('poliklinik_id','=',$id)->get();
        // dd($pasien);
        return view('dokter.data',compact('pasien')); 
    }
    public function index()
    {
        $users = User::where('role',0)->orderBy('id','DESC')->get();
        return view('panel.dokter.data',compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = new user;
        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 0,
        ]);
        return redirect()->route('dokter')->with('sukses-add','sukses menambah data');
    }

    public function edit($id)
    {
        $dokter = User::findOrFail($id);
        return view('panel.dokter.edit',compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $dokter = User::find($id);
        $dokter->name = $request->name;
        $dokter->email = $request->email;
        if ($request->get('password')) {
            $dokter->password =  bcrypt($request->password);
        }
        
        $dokter->save();
        return redirect()->route('dokter')->with('sukses-upd','sukses mengedit data');

    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect()->back()->with('sukses-del','sukses menghapus data');
    }
}
