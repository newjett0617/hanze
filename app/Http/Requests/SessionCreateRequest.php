<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;

class SessionCreateRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => [
                'required',
                'string',
                'min:6',
                'max:20',
            ],
            'password' => [
                'required',
                'string',
                'regex:/^(?=.*?[a-z])(?=.*?[0-9]).{6,20}$/',
            ], // 同時有英數字, 6-20 chars
        ];
    }

    // todo
    protected function failedValidation(Validator $validator)
    {
        $failed = $validator->failed();

        $this->failedValidationResponse(333, $validator->errors()->first());
    }
}
