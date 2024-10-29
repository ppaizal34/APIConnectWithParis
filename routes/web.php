<?php

use App\Http\Controllers\GetApi\GetApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::prefix('/')
->controller(GetApiController::class)
->group(function (){
    Route::get('nation', 'doc_nation')->name('doc_nation');
});


