<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Doc\DocController;
use App\Http\Controllers\GetApi\GetApiController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Route::get('/doc', function (){
//     return view('doc_api.index');
// });



// Route documents API
Route::controller(DocController::class)
->group(function (){
    Route::get('docs/nations', 'docs_nations')->name('doc_nations');
});

// Route AuthController
Route::controller(AuthController::class)
->group(function () {
    Route::get('login', 'show_login');
    Route::post('login', 'authenticate')->name('authenticate');
    Route::get('register', 'show_register');
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout')->name('logout')->middleware('auth:sanctum');
});

// Route User
Route::controller(UserController::class)
->group(function() {
    Route::get('my-profile', 'my_profile')->name('my-profile');
});

// Route::prefix('/')
// ->controller(GetApiController::class)
// ->group(function (){
//     Route::get('nation', 'doc_nation')->name('doc_nation');
// });


