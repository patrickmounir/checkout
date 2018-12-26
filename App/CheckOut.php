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

    public function __construct(Rules $rules)
    {
        $this->rules = $rules;

        $this->checkoutCart = [];
    }

    public function scan($itemName)
    {
        if (!array_has($this->checkoutCart, [$itemName])) {
            $this->checkoutCart[$itemName] = 0;
        }

        $this->checkoutCart[$itemName] = $this->checkoutCart[$itemName] + 1;

        return $this;
    }

    public function getTotal()
    {
        return $this->rules->getTotalPrice($this->checkoutCart);
    }
}
