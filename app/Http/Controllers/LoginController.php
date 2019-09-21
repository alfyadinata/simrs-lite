<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function vlogin()
    {
        if (Auth::Check()) {
            if (Auth::User()->role === 1) {
                return redirect()->route('pasien');
            }
            else {
                return redirect()->route('users');
            }
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required|min:6',
            'password' => 'required'
        ]);
        // dd($request->all());
        if(\Auth::attempt(['email' => $request->email ,'password' => $request->password]))
        {
            $user = User::where('email' ,$request->email)->first();
            if ($user->role === 1)
            {
                return redirect()->route('pasien')->with('login','sukses login');
            }
            if ($user->role === 0)
            {
                return redirect()->route('users')->with('login','sukses login');
            }
        }

        return redirect()->back()->with('invalid','gagal login');
    }
}
