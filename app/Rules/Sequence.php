<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Sequence implements Rule
{
    private $sequence;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $value)
    {
        $this->sequence = $value;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $values)
    {
        foreach (array_values($values) as $key => $array_value) {
            if ($this->sequence[$key] != $array_value) {
                return false;
            }
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
        return 'The invalid sequence.';
    }
}
