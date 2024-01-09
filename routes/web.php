<?php

use Illuminate\Support\Facades\Route;


Route::get('register', [\App\Http\Controllers\AuthController::class, 'registerView']);
Route::post('register-user', [\App\Http\Controllers\AuthController::class, 'register'])->name('registerUser');
Route::get('/', [\App\Http\Controllers\AuthController::class, 'loginView'])->name('loginView');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('forgot-password', [\App\Http\Controllers\AuthController::class, 'forgotPasswordView'])->name('forgot-password-view');
Route::post('forgot-password-logic', [\App\Http\Controllers\AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::get('reset-password/{token}/{email}', [\App\Http\Controllers\AuthController::class, 'resetPasswordView'])->name('resetPasswordView');
Route::post('reset-password-logic', [\App\Http\Controllers\AuthController::class, 'resetPasswordLogic'])->name('resetPasswordLogic');

Route::get('/home', [\App\Http\Controllers\PageController::class, 'homeView'])->name('home')->middleware('auth:sanctum');








