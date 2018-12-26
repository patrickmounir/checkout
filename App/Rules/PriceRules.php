<?php

namespace App\Rules;

class PriceRules extends Rules
{

    public function getPrice($itemName, $itemQuantity)
    {
        $price = 0;

        if (array_has($this->specialPrices, [$itemName])) {
            $specialQuantity = array_keys($this->specialPrices[$itemName])[0];

            if ($itemQuantity / $specialQuantity >= 1) {
                $specialPrice = $this->specialPrices[$itemName][$specialQuantity]
                    * (int)($itemQuantity / $specialQuantity);

                $itemQuantity = ($itemQuantity % $specialQuantity);

                $price += $specialPrice;
            }
        }

        $price += $this->prices[$itemName] * $itemQuantity;

        return $price;
    }

    public function getTotalPrice($cart)
    {
        $price = 0;

        foreach ($cart as $item => $quantity) {
            $price += $this->getPrice($item, $quantity);
        }

        return $price;
    }
}