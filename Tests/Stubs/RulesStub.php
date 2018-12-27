<?php

namespace Tests\Stubs;

use App\Rules\Rules;

class RulesStub extends Rules
{
    /**
     * Returning zero for testing.
     *
     * @param $itemName
     * @param $itemQuantity
     *
     * @return int
     */
    public function getPrice($itemName, $itemQuantity)
    {
        return 0;
    }

    /**
     * Returning zero for testing.
     *
     * @param $cart
     *
     * @return int
     */
    public function getTotalPrice($cart)
    {
        return 0;
    }
}
