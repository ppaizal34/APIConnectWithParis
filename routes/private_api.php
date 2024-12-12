<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmojiController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\CountryController;

Route::prefix('countries')
    ->group(function () {
        Route::get('random', [CountryController::class, 'random'])->name('private.random')->middleware();
        Route::get('/', [CountryController::class, 'index']);
        Route::get('/{country}', [CountryController::class, 'show']);
    });

Route::prefix('emojis')
    ->group(function () {
        Route::get('/', [EmojiController::class, 'index']);
    });
