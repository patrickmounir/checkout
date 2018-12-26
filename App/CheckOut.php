<?php

namespace App;

use App\Rules\Rules;

class CheckOut
{
    /**
     * @var Rules
     */
    private $rules;

    public function __construct(Rules $rules)
    {
        $this->rules = $rules;
    }

    public function scan()
    {

    }

    public function price()
    {

    }
}
