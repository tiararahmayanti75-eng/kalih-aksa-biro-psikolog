<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // 1. Cek Login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Cek apakah user adalah admin (is_admin == 1)
        if ((int)Auth::user()->is_admin === 1) {
            return $next($request);
        }

        // 3. Jika bukan admin, tendang ke halaman pendaftaran
        return redirect('/pendaftaran')->with('error', 'Anda tidak memiliki akses admin!');
    }
}