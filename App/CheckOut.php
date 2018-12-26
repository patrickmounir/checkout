<?php

namespace App;

use App\Rules\Rules;

class CheckOut
{
    /**
     * @var Rules
     */
    private $rules;

    /**
     * @var array
     */
    private $checkoutCart;

    /**
     * @var int
     */
    private $total;

    public function __construct(Rules $rules)
    {
        $this->rules = $rules;
    }

    public function scan()
    {
    }

    public function getTotal()
    {
        return $this->total;
    }
}
