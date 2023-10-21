<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticated(Request $request)
    {
        $request->validate([
            'email' =>  'required|email',
            'password' => 'required'
        ]);
        $crendentials = $request ->only('email','password');

        if (Auth::attempt($crendentials)){
            $request->session()->regenerate();
            return redirect('/dashboard'); 

        }
        return back()->withErrors([
            'loginError' => 'Email atau Password salah'
        ]);
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
