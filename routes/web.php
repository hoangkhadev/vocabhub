<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VocabularyController;
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

    Route::get('/', [TopicController::class, 'index'])->name('guest.home');

    //Topic
    Route::get('/topic', [TopicController::class, 'index'])->name('guest.topic');
    Route::get('/topic/create', [TopicController::class, 'create'])->name('guest.topic.create');
    Route::post('/topic', [TopicController::class, 'store'])->name('guest.topic.store');
    Route::post('/topic/update', [TopicController::class, 'update'])->name('guest.topic.update');
    Route::get('/topic/{id}', [TopicController::class, 'show'])->name('guest.pratice');
    Route::delete('/topic/delete', [TopicController::class, 'destroy'])->name('guest.topic.destroy');

    //Vocabulary
    Route::post('/vocabulary/create', [VocabularyController::class, 'store'])->name('guest.vocabulary.store');
    Route::post('/vocabulary/update', [VocabularyController::class, 'update'])->name('guest.vocabulary.update');
    Route::post('/vocabulary/delete', [VocabularyController::class, 'destroy'])->name('guest.vocabulary.destroy');

    //Test
    Route::get('/test/{user}/{topicname}', [TestController::class, 'index'])->name('guest.test.show');
});

//Forgot password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('auth.forgot-password');
Route::post('/forgot-passowrd', [AuthController::class, 'resetPassword'])->name('auth.process-forgot-password');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('auth.reset-password');

Route::post('/reset-passowrd', [AuthController::class, 'makeNewPassword'])->name('auth.process-reset-password');