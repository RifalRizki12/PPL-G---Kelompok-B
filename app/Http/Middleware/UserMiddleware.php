<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserMiddleware
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

        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('user-is-online' . Auth::user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
