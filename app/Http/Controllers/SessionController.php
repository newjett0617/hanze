<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionCreateRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Str;

class SessionController extends Controller
{
    public function store(SessionCreateRequest $request, UserRepository $repository)
    {
        $data = $request->only([
            'username',
            'password',
        ]);

        $user = preg_match('/^09\d{2}(\d{6})$/', $data['username'])
            ? $repository->findMobile($data['username'])
            : $repository->findUsername($data['username']);

        if ($user === null) {
            return $this->jsonResponse(false, 444, 'user not found');
        }

        $token = Str::random(10);
        $repository->setToken($user, $token);
        $this->setData([
            'token' => $token,
        ]);
        return $this->jsonResponse(true);
    }
}
