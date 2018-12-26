<?php

namespace Tests;

use App\Rules\PriceRules;
use App\Rules\Readers\RulesReader;
use App\Rules\Rules;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\TestCase;

class PriceRulesClassTest extends TestCase
{
    /** @test */
    public function itIsAnInstanceOfRulesReader()
    {
        $mockRules = (new MockBuilder($this, RulesReader::class))->getMock();

        $priceRules = new PriceRules($mockRules);

        $this->assertInstanceOf(Rules::class, $priceRules);
    }

    /** @test */
    public function itHasAMethodCalledGetPrice()
    {
        $mockRules = (new MockBuilder($this, RulesReader::class))->getMock();

        $priceRules = new PriceRules($mockRules);

        $this->assertTrue(
            method_exists($priceRules, 'getPrice'),
            'Class PriceRules should contain method getPrice!'
        );
    }
}
