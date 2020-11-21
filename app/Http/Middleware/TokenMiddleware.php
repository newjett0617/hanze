<?php

namespace App\Http\Middleware;

use App\Repositories\UserRepository;
use Closure;
use Illuminate\Http\Request;

class TokenMiddleware
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // todo 一致的 response 物件
        $user = $this->repository->findToken($request->get('token'));

        if ($user === null) {
            return response()->json([
                'success' => 0,
                'errorCode' => 666,
                'errorMessage' => 'token error, forbidden!',
            ]);
        }
        $request->merge([
            'user' => $user,
        ]);

        return $next($request);
    }
}
