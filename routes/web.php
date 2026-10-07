<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;

// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/test-vercel', function () {
    return response('VERCEL LARAVEL TEST WORKS', 200);
});

// Google Login
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])
    ->name('google.callback');

// Protected routes
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect()->route('tasks.index');
    });

    Route::resource('tasks', TaskController::class);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});