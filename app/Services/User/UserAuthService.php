<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserAuthService
{
    public function login(array $credentials)
    {
        $loginStatus = Auth::attempt($credentials);
        if ($loginStatus) {
            $userToken = Auth::user()->createToken("user");
            return $userToken->plainTextToken;
        }
        return null;
    }

    public function register(array $dataRegister)
    {
        
    }

    public function loginOrSignUpUserGoogle()
    {
        $googleUser = Socialite::driver("google")->stateless()->user();
        
    }
}
