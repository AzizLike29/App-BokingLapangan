<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Navigation\ContactUsController;
use App\Http\Controllers\Navigation\ExperienceController;

Route::post('/login', [LoginController::class, 'login'])->name('api.login');
Route::post('/register', [RegisterController::class, 'register'])->name('api.register');
Route::post('/lupa-password', [ForgotPasswordController::class, 'forgotPassword'])->name('api.forgotPassword');
Route::get('/courts', [CourtController::class, 'index']);

// Contact Us
Route::post('/contact-us', [ContactUsController::class, 'store']);
Route::post('/court-form', [ExperienceController::class, 'store']);
