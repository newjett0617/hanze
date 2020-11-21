<?php

namespace App\Http\Requests;

use App\Rules\TaiwanMobileRule;
use Illuminate\Contracts\Validation\Validator;

class UserCreateRequest extends BaseRequest
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
                'regex:/^(?=([a-zA-Z])).{6,20}$/',
            ], // 需要英文開頭, 6-20 chars
            'password' => [
                'required',
                'string',
                'regex:/^(?=.*?[a-z])(?=.*?[0-9]).{6,20}$/',
            ], // 同時有英數字, 6-20 chars
            'name' => [
                'required',
                'string',
                'max:20',
            ],
            'email' => [
                'required',
                'email',
                'max:30',
            ],
            'mobile' => [
                'required',
                new TaiwanMobileRule(),
            ],
        ];
    }

    // todo
    protected function failedValidation(Validator $validator)
    {
        $failed = $validator->failed();

        $this->failedValidationResponse(111, $validator->errors()->first());
    }
}
