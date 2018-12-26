<?php

namespace Tests;

use App\Rules\CsvRulesReader;
use App\Rules\RulesReader;
use PHPUnit\Framework\TestCase;

class CsvRulesReaderClassTest extends TestCase
{
    /** @test */
    public function itIsAnInstanceOfRulesReader()
    {
        $csvRulesReader = new CsvRulesReader();

        $this->assertInstanceOf(RulesReader::class, $csvRulesReader);
    }
}
