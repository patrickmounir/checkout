<?php

namespace Tests;

use App\Rules\Readers\CsvRulesReader;
use App\Rules\Readers\RulesReader;
use PHPUnit\Framework\TestCase;

class CsvRulesReaderClassTest extends TestCase
{
    /** @test */
    public function itIsAnInstanceOfRulesReader()
    {
        $csvRulesReader = new CsvRulesReader();

        $this->assertInstanceOf(RulesReader::class, $csvRulesReader);
    }

    /** @test */
    public function itHasAMethodCalledParseRules()
    {
        $csvRulesReader = new CsvRulesReader();

        $this->assertTrue(
            method_exists($csvRulesReader, 'parseRules'),
            'Class CsVRulesReader should contain method parseRules!'
        );
    }
}
