<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Contoh: Memeriksa apakah pengguna memiliki peran 'admin'
        if ($request->user() && $request->user()->hasRole('admin')) {
            return $next($request);
        }

        return redirect('/login'); // Redirect jika tidak memenuhi kriteria
    }   
}
