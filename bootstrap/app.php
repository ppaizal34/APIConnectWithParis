<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\AuthOrGuestThrottle;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['api', 'throttle:auth', 'auth:sanctum'])
                ->prefix('api/private')
                ->group(base_path('routes/private_api.php'));

            Route::middleware(['api', 'throttle:guest'])
                ->prefix('api/public')
                ->group(base_path('routes/public_api.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth.or.throttle' => AuthOrGuestThrottle::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
