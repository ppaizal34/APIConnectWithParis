<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('countries')->group(function(){
    Route::get('random', [CountryController::class, 'random']);
    Route::resource('/', CountryController::class)->parameters(['' => 'country']);
});

