<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TaiwanMobileRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (strlen($value) !== 10) {
            return false;
        }

        if (!preg_match('/^09\d{2}(\d{6})$/', $value)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute error message.';
    }
}
