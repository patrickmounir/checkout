<?php

namespace App\Rules;

class PriceRules extends Rules
{

    public function getPrice($itemName, $itemQuantity)
    {
        return $this->prices[$itemName] * $itemQuantity;
    }
}