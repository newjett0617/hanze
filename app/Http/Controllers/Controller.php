<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function jsonResponse(bool $success, int $errorCode = 0, string $errorMessage = '', array $data = [])
    {
        return response()->json(array_merge([
            'success' => $success ? 1 : 0,
            'errorCode' => $errorCode,
            'errorMessage' => $errorMessage,
        ], $data));
    }
}
