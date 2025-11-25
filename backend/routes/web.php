<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Socialite\GoogleLoginController;

// Test API Route
Route::get('/ping', function () {
    return response()->json([
        'message' => 'API Badminton Rental OK'
    ]);
});

Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])
    ->name('google.redirect');

Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])
    ->name('google.callback');
