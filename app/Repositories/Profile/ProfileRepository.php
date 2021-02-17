<?php

namespace App\Repositories\Profile;

use Tymon\JWTAuth\Facades\JWTAuth;

class ProfileRepository implements IProfileRepository {
    public function getAuthUser()
    {
        $profile = JWTAuth::parseToken()->authenticate();

        return $profile;
    }
}