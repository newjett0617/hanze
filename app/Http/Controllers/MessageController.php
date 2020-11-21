<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageCreateRequest;

class MessageController extends Controller
{
    public function store(MessageCreateRequest $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->get('user');

        $message = $user->messages()->create($request->only(['message']));

        $this->setData([
            'messageId' => $message['id'],
        ]);
        return $this->jsonResponse(true);
    }
}
