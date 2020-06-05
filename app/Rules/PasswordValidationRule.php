<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordValidationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(empty($value)) {
            return false;
        }

        if(strlen($value) < 6) {
            return false;
        }

        if(preg_match('/[^a-zA-Z\d]/', $value) == 0) {
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
        return 'Please include at least one special character in your password and Required minimum 6 characters.';
    }
}
