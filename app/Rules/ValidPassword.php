<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPassword implements Rule
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
        //
        return preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/',$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'رمز عبور باید حداقل 8 کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد باشد.';
    }
}
