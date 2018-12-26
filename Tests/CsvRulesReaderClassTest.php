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

    /** @test */
    public function itParsesTheCsvFileIntoAnArrayCorrectly()
    {
        $csvRulesReader = new CsvRulesReader('rules.csv');

        $parsedData = $csvRulesReader->parseRules();

        $this->assertArrayHasKey('prices', $parsedData);

        $this->assertArrayHasKey('specialPrices', $parsedData);

        $this->assertEquals([
            'A' => 50,
            'B' => 30,
            'C' => 20,
            'D' => 15
        ], $parsedData['prices']);

        $this->assertEquals([
            'A' => [3 => 130],
            'B' => [2 => 45],
        ], $parsedData['specialPrices']);
    }
}
