<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Login user.
     *
     * @return App\Traits\SendResponse
     */
    public function login()
    {
        $admin = User::where('email', request()->email)->first();
        
        if (is_null($admin) || !Hash::check(request()->password, $admin->password)) {
            return $this->badRequest('incorrect email/password');
        }

        $token = JWTAuth::fromUser($admin);
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return App\Traits\SendResponse
     */
    public function authenticated()
    {
        return $this->acceptData(auth()->user());
    }
}
