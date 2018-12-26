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

    public function __construct(RulesReader $rulesReader)
    {
        $this->rulesReader = $rulesReader;

        $rules = $rulesReader->parseRules();

        $this->prices = $rules['prices'];

        $this->specialPrices = $rules['specialPrices'];
    }

    abstract public function getPrice($itemName, $itemQuantity);
}