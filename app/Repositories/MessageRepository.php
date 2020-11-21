<?php

namespace App\Repositories;

use App\Models\Message;

class MessageRepository
{
    public function findById($value)
    {
        return Message::query()->find($value);
    }
}
