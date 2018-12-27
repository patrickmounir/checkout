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
     * CheckOut constructor.
     *
     * @param Rules $rules
     */
    public function __construct(Rules $rules)
    {
        $this->rules = $rules;

        $this->checkoutCart = [];
    }

    /**
     * Adds the item to the cart for checkout.
     *
     * @param $itemName
     *
     * @return $this
     */
    public function scan($itemName)
    {
        if (!array_has($this->checkoutCart, [$itemName])) {
            $this->checkoutCart[$itemName] = 0;
        }

        $this->checkoutCart[$itemName] = $this->checkoutCart[$itemName] + 1;

        return $this;
    }

    /**
     * Calculates the total price of the cart.
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->rules->getTotalPrice($this->checkoutCart);
    }
}
