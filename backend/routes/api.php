<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::post('/login', [LoginController::class, 'login'])->name('api.login');
Route::post('/register', [RegisterController::class, 'register'])->name('api.register');
Route::post('/lupa-password', [ForgotPasswordController::class, 'forgotPassword'])->name('api.forgotPassword');
