<?php

namespace Modules\User\Http\Controllers;

use App\Services\User\UserAuthService;
use App\Traits\ApiResponseTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        
    }
}
