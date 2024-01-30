<?php

namespace App\Services\User;

use App\Mail\UserRegister;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $user = User::create($dataRegister);
        Mail::to($user->email)->queue(new UserRegister($user));
        return true;
    }

    public function loginOrSignUpUserGoogle()
    {
        $googleUser = Socialite::driver("google")->stateless()->user();
        
    }
}
