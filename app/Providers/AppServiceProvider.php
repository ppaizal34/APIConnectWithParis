<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

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
        RateLimiter::for('guest', function (){
            return Limit::perMinute(2)->response(function() {
                return response()->json([
                    'message' => 'To many request'
                ], 429);
            });
        });

        RateLimiter::for('auth', function (){
            return Limit::perMinute(3)->response(function() {
                return response()->json([
                    'message' => 'To many request'
                ], 429);
            });
        });
    }
}
