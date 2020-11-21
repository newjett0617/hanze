<?php

namespace App\Repositories;

use App\Models\User;

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
}
