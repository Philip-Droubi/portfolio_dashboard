<?php

use App\Http\Controllers\MainPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['cors', 'json']], function () {
    Route::controller(MainPageController::class)->group(function () {
        Route::get('/visit', 'newVisit');
        Route::post('/Subscribe', 'subscribe')->middleware('bots');
        Route::post('/message', 'sendMessage')->middleware('bots');
        Route::get('/home', 'getHomeData');
        Route::get('/fix', 'fixVisitors');
    });
});
