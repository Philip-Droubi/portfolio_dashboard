<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubscriperController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

use Stevebauman\Location\Facades\Location;

Route::get('/', function () {
    // return view('emails.welcome', ["details" => ["key" => "$98746dsadsadsa.dsa"]]);
});

Route::group(['middleware' => ['throttle:60', 'prevent-back-history']], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/auth', 'authenticate')->middleware(ProtectAgainstSpam::class);
        Route::post('/logout', 'logout');
        Route::prefix('dashboard/users')->middleware(['auth', 'lastseen'])->group(function () {
            Route::get('/register', 'register');
            Route::post('/', 'store')->middleware(ProtectAgainstSpam::class);
            Route::get('/edit/{id}', 'edit');
            Route::put('/{id}', 'update')->middleware(ProtectAgainstSpam::class);
            Route::delete('/{id}', 'destroy');
        });
    });
    Route::controller(DashboardController::class)->prefix('dashboard')->middleware(['auth', 'lastseen'])->group(function () {
        Route::get('/', 'index');
        Route::get('/admins', 'getAdmins');
        Route::get('/visits', 'getVisits');
        Route::get('/visits/getDetails', 'getVisitsDetails');
    });
    Route::controller(SubscriperController::class)->prefix('dashboard')->middleware(['auth', 'lastseen'])->group(function () {
        Route::get('/subs', 'index');
        Route::get('/subs/getDetails', 'getDetails');
        Route::delete('/subs/{id}', 'destroy');
    });
    Route::controller(MessageController::class)->prefix('dashboard')->middleware(['auth', 'lastseen'])->group(function () {
        Route::get('/messages', 'index');
        Route::get('/messagesByCountry', 'getByCountry');
        Route::delete('/messages/{id}', 'destroy');
        Route::get('/messages/checked/{id}', 'answer');
        Route::get('/messages/send/{id}', 'create');
        Route::post('/messages/send/{id}', 'sendMsg');
        Route::get('/messages/answers/{id}', 'getAnswers');
    });
    Route::controller(ProjectController::class)->prefix('dashboard/projects')->middleware(['auth', 'lastseen'])->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/edit/{id}', 'edit');
        Route::post('/', 'store')->middleware(ProtectAgainstSpam::class);
        Route::put('/{id}', 'update')->middleware(ProtectAgainstSpam::class);
        Route::delete('/{id}', 'destroy');
    });
});
