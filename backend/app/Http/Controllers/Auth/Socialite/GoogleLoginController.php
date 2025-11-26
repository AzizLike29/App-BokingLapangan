<?php

namespace App\Http\Controllers\Auth\Socialite;

use App\Models\User;
use Laravel\Socialite\Two\GoogleProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        /** @var GoogleProvider $google */
        $google = Socialite::driver('google');

        return $google->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        /** @var GoogleProvider $google */
        $google = Socialite::driver('google');
        $googleUser = $google->stateless()->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (! $user) {
            $user = User::create([
                'name'     => $googleUser->getName(),
                'email'    => $googleUser->getEmail(),
                'password' => Hash::make(rand(100000, 999999)),
            ]);
        }

        Auth::login($user);

        return redirect()->intended('/dashboard');
    }
}
