<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReceiverMiddleware
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

        // Jika bukan receiver
        if (session('role') !== 'receiver') {
            return redirect()->route('donor.dashboard')->with('error', 'Access Rejected, Receiver Role Only!');
        }

        /*
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in first!');
        }

        // cek role (misal harus donor)
        if (auth()->user()->role !== 'receiver') {
            abort(403, 'Access denied.');
        }
        */

        return $next($request);
    }
}
