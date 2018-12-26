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
        $csvRulesReader = new CsvRulesReader('rules.csv');

        $this->assertInstanceOf(RulesReader::class, $csvRulesReader);
    }

    /** @test */
    public function itHasAMethodCalledParseRules()
    {
        $csvRulesReader = new CsvRulesReader('rules.csv');

        $this->assertTrue(
            method_exists($csvRulesReader, 'parseRules'),
            'Class CsVRulesReader should contain method parseRules!'
        );
    }

    /** @test */
    public function itShouldHaveAttributeFileName()
    {
        $csvRulesReader = new CsvRulesReader('rules.csv');

        $this->assertObjectHasAttribute('fileName', $csvRulesReader);
    }
}
