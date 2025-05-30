<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !Auth::user()->hasRole('siswa')) {
            Auth::logout(); // Optional: logout user jika role tidak sesuai
            return redirect('/login')->with('akses_ditolak', 'Akses ditolak: Anda tidak memiliki hak sebagai siswa.');
            }
        return $next($request);
    }
}