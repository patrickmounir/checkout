<?php

namespace App\Rules\Readers;

abstract class RulesReader
{
    /**
     * @var string $fileName
     */
    protected $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    abstract public function parseRules();
}