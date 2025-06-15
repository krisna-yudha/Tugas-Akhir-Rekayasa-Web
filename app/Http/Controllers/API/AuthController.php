<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email atau password salah'
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'token' => $user->createToken('api-token')->plainTextToken,
            'user' => $user
        ]);
    }

    public function refresh(Request $request)
    {
        // Hapus token saat ini
        $request->user()->currentAccessToken()->delete();
        
        // Buat token baru
        $token = $request->user()->createToken('api-token')->plainTextToken;
        
        return response()->json([
            'status' => 'success',
            'message' => 'Token berhasil diperbarui',
            'token' => $token,
            'user' => $request->user()
        ]);
    }

    public function logout(Request $request)
    {
        // Hapus token saat ini
        $request->user()->currentAccessToken()->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil logout'
        ]);
    }
}
