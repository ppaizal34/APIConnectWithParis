<?php

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doc\DocController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\GetApi\GetApiController;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/login', function() {
    return abort(401);
});

// Route cache
// Route::get('/putCache', function(){
//     $second = 60; 
//     $user = User::all(); // Konversi ke array
//     Cache::put('user', $user, $second);
// });

// Route::get('/getCache', function () {
//     $users = Cache::get('user');
//     return view('cache.index', ['users' => $users]);
// });

Route::get('/getUser', function() {
    $second = '120';
    $user = Cache::remember('users', $second, function(){
        return User::all();
    });

    return view('cache.index', [
        'users' => $user
    ]);

});

Route::get('/noCache', function(){
    $user = User::all();
    return view('cache.index', [
        'users' => $user 
    ]);
});

// Route::get('/cache', function(){
//     $value = Cache::remember('users', 4, function () {
//         return User::all();
//     });

//     return $value;
// });

// Route::get('/cache2', function(){
//     $value = Cache::remember('users', 4, function () {
//         return User::Count();
//     });

//     return $value;
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



