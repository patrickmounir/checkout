<?php

namespace App\Rules\Readers;

abstract class RulesReader
{
    /**
     * @var string $fileName
     */
    protected $fileName;

    /**
     * RulesReader constructor.
     *
     * @param string $fileName
     */
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * Parses the rules in the fileName to an array in order to interpret prices and special offers.
     *
     * @return array
     */
    abstract public function parseRules();
}
