<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Auth\AuthController;

Route::prefix('countries')
    ->group(function () {
        Route::get('random', [CountryController::class, 'random'])->name('private.random')->middleware();
        Route::get('/', [CountryController::class, 'index']);
        Route::get('/{country}', [CountryController::class, 'show']);
    });

