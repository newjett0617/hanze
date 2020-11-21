<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;

class MessageReplyRequest extends BaseRequest
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
            'message_id' => [
                'required',
                'exists:messages,id',
            ],
            'reply' => [
                'required',
                'string',
                'max:100',
            ],
        ];
    }

    // todo
    protected function failedValidation(Validator $validator)
    {
        $failed = $validator->failed();

        $this->failedValidationResponse(777, $validator->errors()->first());
    }
}
