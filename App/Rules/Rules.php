<?php

namespace App\Rules;

use App\Rules\Readers\RulesReader;

abstract class Rules
{
    /**
     * @var RulesReader
     */
    private $rulesReader;

    public function __construct(RulesReader $rulesReader)
    {
        $this->rulesReader = $rulesReader;
    }

    abstract public function getPrice();
}