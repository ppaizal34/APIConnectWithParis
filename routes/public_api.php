<?php

use App\Models\NationalHero;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmojiController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\VolcanoController;
use App\Http\Controllers\Api\NationalHeroController;
use App\Http\Controllers\Api\IslamicPrayerController;

Route::prefix('countries')
    ->group(function () {
        Route::get('random', [CountryController::class, 'random'])->name('public.random');
        Route::get('/', [CountryController::class, 'index']);
        Route::get('/{country}', [CountryController::class, 'show']);
    });

Route::prefix('emojis')
    ->group(function () {
        Route::get('paginate', [EmojiController::class, 'paginate'])->name('public.paginate');
    });

Route::prefix('heroes')
    ->group(function () {
        Route::get('/', [NationalHeroController::class, 'index']);
        Route::get('random', [NationalHeroController::class, 'random']);
        Route::get('/{hero}', [NationalHeroController::class, 'spesifik_name']);
    });

Route::prefix('volcanoes')
    ->group(function () {
        Route::get('/', [VolcanoController::class, 'index']);
        Route::get('random', [VolcanoController::class, 'random']);
        Route::get('/{hero}', [VolcanoController::class, 'spesifik_name']);
    });

Route::prefix('islamic_prayer')
    ->group(function () {
        Route::get('/', [IslamicPrayerController::class, 'index']);
    });
