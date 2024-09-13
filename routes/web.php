<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('isAuth')->group(function () {
    Route::get('/signup', [AuthController::class, 'getSignup'])->name('auth.getSignup');
    Route::post('/signup', [AuthController::class, 'signup'])->name('auth.signup');

    Route::get('/signin', [AuthController::class, 'getSignin'])->name('auth.getSignin');
    Route::post('/signin', [AuthController::class, 'signin'])->name('auth.signin');
});

Route::middleware('checkUserLogin')->group(function () {
    Route::get('/signout', [AuthController::class, 'signout'])->name('auth.signout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('auth.profile');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::post('/update', [UserController::class, 'update'])->name('user.update');

    Route::get('/', function () {
        return view('welcome');
    })->name('guest.home');

    Route::get('/topics', function () {
        return view('guest.topic');
    })->name('guest.topic');

    Route::get('/topics/{id}', function () {
        return view('guest.topic-detail');
    })->name('guest.pratice');

    Route::get('/topic/create', function () {
        return view('guest.topic-create');
    })->name('guest.create-topic');
});
