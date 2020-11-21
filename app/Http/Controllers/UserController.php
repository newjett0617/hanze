<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    public function store(UserCreateRequest $request, UserRepository $repository)
    {
        $username = $repository->findUsername($request->get('username'));
        $mobile = $repository->findMobile($request->get('mobile'));

        if ($username !== null || $mobile !== null) {
            return $this->jsonResponse(false, 222, 'username or mobile registered');
        }

        $repository->createUser($request->only([
            'username',
            'password',
            'name',
            'email',
            'mobile',
        ]));

        return $this->jsonResponse(true);
    }
}
