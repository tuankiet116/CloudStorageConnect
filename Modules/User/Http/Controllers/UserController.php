<?php

namespace Modules\User\Http\Controllers;

use App\Services\User\UserService;
use App\Traits\ApiResponseTrait;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    use ApiResponseTrait;

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function profile()
    {
        $profile = $this->userService->getMyProfile();
        if ($profile) {
            $profile = $profile->toArray();
            return $this->responseJson($profile);
        } else {
            return $this->responseJson(null, HTTP_NOT_FOUND);
        };

    }
}
