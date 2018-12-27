<?php

namespace Tests\Stubs;

use App\Rules\Readers\RulesReader;

class RulesReaderStub extends RulesReader
{
    /**
     * Returning a fixed array for testing.
     *
     * @return array
     */
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
                'B' => [3 => 45],
            ]
        ];
    }
}
