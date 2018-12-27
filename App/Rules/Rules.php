<?php

namespace App\Rules;

use App\Rules\Readers\RulesReader;

abstract class Rules
{
    /**
     * @var RulesReader $rulesReader
     */
    private $rulesReader;

    /**
     * Holds the prices of items.
     *
     * @var array $prices
     */
    protected $prices;

    /**
     * Holds the special prices of items and their condition.
     *
     * @var array $specialPrices
     */
    protected $specialPrices;

    /**
     * Rules constructor.
     *
     * @param RulesReader $rulesReader
     */
    public function __construct(RulesReader $rulesReader)
    {
        $this->rulesReader = $rulesReader;

        $rules = $rulesReader->parseRules();

        $this->prices = $rules['prices'];

        $this->specialPrices = $rules['specialPrices'];
    }

    /**
     * Gets the price of the item given with the quantity given.
     *
     * @param $itemName
     * @param $itemQuantity
     *
     * @return mixed
     */
    abstract public function getPrice($itemName, $itemQuantity);

    /**
     * Gets the total cost of the items in the cart given.
     *
     * @param $cart
     *
     * @return mixed
     */
    abstract public function getTotalPrice($cart);
}
