<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Services\UserManagement\UserService;
use App\Repositories\ServiceInterfaces\UserManagement\UserServiceInterface;

/**
 * LogoutController class
 */
class LogoutController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * LogoutController constructor
     *
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Logout
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $userAuth = $request->user('api');
        return $this->userService->logout($userAuth);
    }
}
