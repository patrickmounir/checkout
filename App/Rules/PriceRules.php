<?php

namespace App\Rules;

class PriceRules extends Rules
{

    public function getPrice($itemName, $itemQuantity)
    {
        if (array_has($this->specialPrices, [$itemName]) &&
            array_has($this->specialPrices[$itemName], [$itemQuantity])) {
            return $this->specialPrices[$itemName][$itemQuantity];
        }
        return $this->prices[$itemName] * $itemQuantity;
    }
}