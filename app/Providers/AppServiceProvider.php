<?php

namespace App\Providers;

use App\Models\RateLimit;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        $rateLimitAuth = RateLimit::where('name', 'auth')->get();
        $rateLimitGuest = RateLimit::where('name', 'guest')->get();

        RateLimiter::for('guest', function () use($rateLimitGuest) {
            $max_requests = $rateLimitGuest->value('max_requests');
            $message = $rateLimitGuest->value('message');

            return Limit::perMinute($max_requests)->response(function() use($message) {
                return response()->json([
                    'message' => $message
                ], 429);
            });
        });

        RateLimiter::for('auth', function () use ($rateLimitAuth){
            $max_requests = $rateLimitAuth->value('max_requests');
            $message = $rateLimitAuth->value('message');

            return Limit::perMinute($max_requests)->response(function() use ($message){
                return response()->json([
                    'message' => $message
                ], 429);
            });
        });
    }
}
