<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    public function redirectTo()
    {
        //login admin
        if (Auth::user()->role_as == 'admin')
        {
            return 'dashboard';
        }

        //login pemilik
        if (Auth::user()->role_as == 'pemilik')
        {
            return 'pemilik-dashboard';
        }

        //login pencari
        if (Auth::user()->role_as == 'pencari')
        {
            return '/';
        }

        //login pencari
        if (Auth::user()->role_as == NULL)
        {
            return '/';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
