<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ProductPriceRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $price;
    public function __construct($price)
    {

        $this->price = $price;

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {

        if($value == null && $this->price == null){
            return 0;
        }

        return 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Please enter at least one price from new price or refurbished price.';
    }
}
