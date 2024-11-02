<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GetApi\GetApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/doc', function (){
    return view('doc_api.index');
});

Route::prefix('/')
->controller(AuthController::class)
->group(function () {
    Route::get('login', 'index');
    Route::get('register', 'index');

});

Route::prefix('/')
->controller(GetApiController::class)
->group(function (){
    Route::get('nation', 'doc_nation')->name('doc_nation');
});


