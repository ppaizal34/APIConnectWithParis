<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class AuthOrGuestThrottle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            // Jika sudah login, pastikan menggunakan auth:sanctum
            if (!Auth::guard('sanctum')->check()) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
        }

        return $next($request);
    }

     /**
     * Terapkan throttle ke request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    protected function applyThrottle(Request $request)
    {
        $request->route()->middleware('throttle:2,1');
    }
}
