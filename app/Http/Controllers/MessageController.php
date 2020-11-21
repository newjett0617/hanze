<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageCreateRequest;
use App\Http\Requests\MessageReplyRequest;
use App\Repositories\MessageRepository;

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

    public function reply(MessageReplyRequest $request, MessageRepository $repository)
    {
        $reply = $repository->findById($request->get('message_id'))
            ->reply()
            ->create($request->only(['reply']));

        $this->setData([
            'replyId' => $reply['id'],
        ]);
        return $this->jsonResponse(true);
    }
}
