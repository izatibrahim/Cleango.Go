<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Check if user is admin
        if (auth()->user()->role !== 'admin') {
            auth()->logout();
            return redirect('/login')->with('error', 'Anda tidak memiliki akses admin.');
        } elseif (auth()->user()->role === 'user') {
            return redirect('/landing');
        }

        return $next($request);
    }
}
