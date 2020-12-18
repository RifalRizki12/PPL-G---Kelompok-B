<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    public function login()
    {
        return view('sites.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role_as == 'admin') {
                return view('admin.dashboard');
            }

            //login pemilik
            if (Auth::user()->role_as == 'pemilik') {
                return view('pemilik.dashboard');
            }

            //login pencari
            if (Auth::user()->role_as == 'pencari') {
                return view('pencari.dashboard');
            }

            //login pencari
            if (Auth::user()->role_as == NULL) {
                return view('frontend.index');
            }
        }
        return redirect('/login')->with('sukses', 'Email Atau Password salah');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
