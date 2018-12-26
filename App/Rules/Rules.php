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

    public function __construct(RulesReader $rulesReader)
    {
        $this->rulesReader = $rulesReader;
    }

    abstract public function getPrice();
}