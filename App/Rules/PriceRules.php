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

    public function getTotalPrice($cart)
    {
        $price = 0;

        foreach ($cart as $item => $quantity) {
            if (array_has($this->specialPrices, [$item])) {
                $specialQuantity = array_keys($this->specialPrices[$item])[0];

                if ($quantity / $specialQuantity >= 1) {
                    $specialPrice = $this->getPrice($item, $specialQuantity) * (int)($quantity / $specialQuantity);

                    $quantity = ($quantity % $specialQuantity);

                    $price += $specialPrice;
                }
            }

            $price += $this->getPrice($item, $quantity);
        }

        return $price;
    }
}