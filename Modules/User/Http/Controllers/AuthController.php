<?php

namespace Modules\User\Http\Controllers;

use App\Services\User\UserAuthService;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Modules\User\Http\Requests\Auth\LoginRequest;
use Modules\User\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    use ApiResponseTrait;

    private $userAuthService;

    public function __construct(UserAuthService $userAuthService)
    {
        $this->userAuthService = $userAuthService;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $userToken = $this->userAuthService->login($data);
        if ($userToken) {
            return $this->responseJson([
                "token" => $userToken
            ]);
        }
        return $this->responseJson(null, HTTP_FORBIDDEN);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        try {
            $this->userAuthService->register($data);
            return response("Register Success");
        } catch (Exception $e) {
            Log::error("User register controller error" . $e->getMessage() . " at #" . $e->getLine());
        }
    }

    public function callbackLoginGoogle()
    {
        try {
            $response = $this->userAuthService->loginOrSignUpUserGoogle();
        } catch (Exception $e) {
            
        }
    }

    public function loginWithGoogle() {
        return Socialite::driver("google")->redirect();
    }
}
