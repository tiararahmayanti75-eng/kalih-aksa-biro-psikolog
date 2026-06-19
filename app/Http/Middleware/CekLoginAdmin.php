<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika tidak ada session 'sudah_login', tendang balik ke halaman login
        if (!session()->has('sudah_login')) {
            return redirect('/login')->with('wajib_login', 'Anda harus login terlebih dahulu untuk mengakses Panel Admin!');
        }

        return $next($request);
    }
}