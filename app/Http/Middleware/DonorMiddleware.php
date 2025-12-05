<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DonorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('role')) {
            return redirect()->route('login')->with('error', 'Please log in first!');
        }

        // Jika bukan donor
        if (session('role') !== 'donor') {
            return redirect()->route('receiver.dashboard')->with('error', 'Access Rejected, Donor Role Only!');
        }

        /*
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in first!');
        }

        // cek role (misal harus donor)
        if (auth()->user()->role !== 'donor') {
            abort(403, 'Access denied.');
        }
        */

        return $next($request);
    }
}
