<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::user()->role_as == 'admin') {
            return $next($request);
        } else if (Auth::user()->role_as == 'pencari') {
            return redirect('/pencari-dashboard')->with('status', 'Anda tidak memiliki izin untuk mengakses halaman ini');
        } else {
            return redirect('/pemilik-dashboard')->with('status', 'Anda tidak memiliki izin untuk mengakses halaman ini');
        }
    }
}
