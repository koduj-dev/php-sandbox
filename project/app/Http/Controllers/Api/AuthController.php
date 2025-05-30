<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function login(Request $request): JsonResponse {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::whereEmail($request->email)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw new AuthenticationException("Invalid credentials.");
        }

        $token = $user->createToken('api-token', ['*'], now()->addWeek());

        return response()->json([
            'token' => $token->plainTextToken,
            'token_expiration' => $token->accessToken->expires_at,
            'user' => $user
        ]);
    }

    public function me() {
        return (request()->user());
    }

    public function logout() {
        request()->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
}
