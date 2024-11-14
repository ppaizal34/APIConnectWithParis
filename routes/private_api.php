<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountryController;

Route::prefix('countries')
    ->group(function () {
        Route::get('random', [CountryController::class, 'random'])->name('private.random');
        Route::get('/', [CountryController::class, 'index']);
        Route::get('/{country}', [CountryController::class, 'show']);
    });
