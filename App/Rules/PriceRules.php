<?php

namespace App\Rules;

class PriceRules extends Rules
{
    /**
     * Gets the price of the item given with the quantity given.
     *
     * @param $itemName
     * @param $itemQuantity
     *
     * @return mixed
     */
    public function getPrice($itemName, $itemQuantity)
    {
        $price = 0;

        list($itemQuantity, $price) = $this->CalculateSpecialPrice($itemName, $itemQuantity, $price);

        $price += $this->prices[$itemName] * $itemQuantity;

        return $price;
    }

    /**
     * Gets the total cost of the items in the cart given.
     *
     * @param $cart
     *
     * @return mixed
     */
    public function getTotalPrice($cart)
    {
        $price = 0;

        foreach ($cart as $item => $quantity) {
            $price += $this->getPrice($item, $quantity);
        }

        return $price;
    }

    /**
     * Calculates special price if applicable and subtracts the quantity required for
     * the special price from the original quantity.
     *
     * @param $itemName
     * @param $itemQuantity
     * @param $price
     *
     * @return array
     */
    private function calculateSpecialPrice($itemName, $itemQuantity, $price)
    {
        if (array_has($this->specialPrices, [$itemName])) {
            $specialQuantity = array_keys($this->specialPrices[$itemName])[0];

            if ($itemQuantity / $specialQuantity >= 1) {
                $specialPrice = $this->specialPrices[$itemName][$specialQuantity]
                    * (int)($itemQuantity / $specialQuantity);

                $itemQuantity = ($itemQuantity % $specialQuantity);

                $price += $specialPrice;
            }
        }
        return array($itemQuantity, $price);
    }
}
