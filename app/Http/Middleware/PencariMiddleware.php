<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PencariMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role_as == 'pencari') {
            if (Auth::check() && Auth::user()->isverified) {
                $verified = Auth::user()->isverified == "1";
                Auth::logout();

                if ($verified == 1) {
                    $message = 'Akun anda masih belum diverifiksai oleh admin. Silahkan hubungi admin untuk informasi lebih lanjut.';
                }
                return redirect()->route('login')
                    ->with('status', $message)
                    ->withErrors(['email' => 'Akun anda masih belum diverifiksai oleh admin. Silahkan hubungi admin untuk informasi lebih lanjut.']);
            }
            return $next($request);
        } else if (Auth::user()->role_as == 'admin') {
            return redirect('/dashboard')->with('status', 'Anda tidak memiliki izin untuk mengakses halaman ini');
        } else if (Auth::user()->role_as == 'pemilik') {
            return redirect('/pemilik-dashboard')->with('status', 'Anda tidak memiliki izin untuk mengakses halaman ini');
        } else {
            return redirect('/pencari-dashboard')->with('status', 'Anda tidak memiliki izin untuk mengakses halaman ini');
        }
    }
}
