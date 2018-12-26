<?php

namespace Tests\Stubs;

use App\Rules\Readers\RulesReader;

class RulesReaderStub extends RulesReader
{
    public function parseRules()
    {
        return [
            'prices' => [
                'A' => 50,
                'B' => 30,
                'C' => 20,
                'D' => 15
            ],
            'specialPrices' => [
                'A' => [3 => 130],
                'B' => [2 => 45],
            ]
        ];
    }
}
