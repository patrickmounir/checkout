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

        $this->total = 0;
    }

    public function scan($itemName)
    {
        if (!array_has($this->checkoutCart, [$itemName])) {
            $this->checkoutCart[$itemName] = 0;
        }

        $this->checkoutCart[$itemName] = $this->checkoutCart[$itemName] + 1;

        $this->total = $this->rules->getTotalPrice($this->checkoutCart);

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }
}
