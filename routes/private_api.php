<?php

use App\Models\NationalHero;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmojiController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\VolcanoController;
use App\Http\Controllers\Api\NationalHeroController;
use App\Http\Controllers\Api\IslamicPrayerController;

Route::prefix('countries')
    ->group(function () {
        Route::get('random', [CountryController::class, 'random'])->name('private.random')->middleware();
        Route::get('/', [CountryController::class, 'index']);
        Route::get('/{country}', [CountryController::class, 'show']);
    });

Route::prefix('emojis')
    ->group(function () {
        Route::get('random', [EmojiController::class, 'random']);
        Route::get('/', [EmojiController::class, 'index']);
    });

Route::prefix('heroes')
    ->group(function () {
        Route::get('random', [NationalHeroController::class, 'random']);
        Route::get('/', [NationalHeroController::class, 'index']);
        Route::get('/{name}', [NationalHeroController::class, 'spesifik_name']);
    });

Route::prefix('volcanoes')
    ->group(function () {
        Route::get('/', [VolcanoController::class, 'index']);
        Route::get('random', [VolcanoController::class, 'random']);
        Route::get('/{name}', [VolcanoController::class, 'spesifik_name']);
    });

Route::prefix('islamic_prayer')
    ->group(function () {
        Route::get('random', [IslamicPrayerController::class, 'random']);
        Route::get('/', [IslamicPrayerController::class, 'index']);
    });
