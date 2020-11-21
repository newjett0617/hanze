<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    public function findUsername($value)
    {
        return User::query()
            ->where('username', $value)
            ->first();
    }

    public function findMobile($value)
    {
        return User::query()
            ->where('mobile', $value)
            ->first();
    }

    public function createUser(array $attributes)
    {
        return User::query()
            ->create($attributes);
    }

    public function setToken(Model $user, $value)
    {
        $user['token'] = $value;
        $user->save();
        return $user;
    }
}
