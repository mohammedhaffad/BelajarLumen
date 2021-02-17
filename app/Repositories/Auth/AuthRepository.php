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

    public function Register($request)
    {
        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $plainPassword = $request->password;
            $user->password = app('hash')->make($plainPassword);

            $user->save();
            $token = JWTAuth::fromUser($user);
            return $token;
        } catch (\Exception $e) {
            return;
        }
    }

    public function Logout()
    {
        $token = JWTAuth::getToken();
        if ($token) {
            JWTAuth::setToken($token)->invalidate();
        }
    }

    public function Profile()
    {
        $profile = auth()->user();
        return $profile;
    }
}