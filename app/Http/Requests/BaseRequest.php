<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    protected function failedValidationResponse(int $errorCode, string $errorMessage, array $data = [])
    {
        // todo 抽出來, 與 controller 結合, 需要一個 errorCode 表進行查表及吐訊息
        throw new HttpResponseException(response()->json(array_merge([
            'success' => 0,
            'errorCode' => $errorCode,
            'errorMessage' => $errorMessage,
        ], $data)));
    }
}
