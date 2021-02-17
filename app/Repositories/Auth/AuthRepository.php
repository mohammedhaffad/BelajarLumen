<?php

namespace App\Repositories\Auth;

// use App\Models\User;

use App\Models\User;
use App\Repositories\Auth\IAuthRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Support\Facades\Auth;

class AuthRepository implements IAuthRepository {
    public function Login($request)
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $token;
    }

    public function Logout()
    {
        $token = JWTAuth::getToken();
        if ($token) {
            JWTAuth::setToken($token)->invalidate();

            return true;
        }
        return;
    }
}