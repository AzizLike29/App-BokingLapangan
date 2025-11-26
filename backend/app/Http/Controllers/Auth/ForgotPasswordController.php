<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $data = $request->validated();

        // Cari user berdasarkan email
        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return response()->json([
                'message' => 'Akun tidak terautentikasi'
            ], 404);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'message' => 'Password berhasil diubah.',
        ]);
    }
}
