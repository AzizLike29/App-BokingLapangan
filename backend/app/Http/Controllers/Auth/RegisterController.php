<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'nama'     => $data['nama'],
            'email'    => $data['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        return response()->json([
            'message' => 'Registrasi Berhasil',
            'user'    => $user,
        ]);
    }
}
