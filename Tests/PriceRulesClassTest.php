<?php

namespace Tests;

use App\Rules\PriceRules;
use App\Rules\Readers\RulesReader;
use App\Rules\Rules;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\RulesReaderStub;

class PriceRulesClassTest extends TestCase
{
    /** @test */
    public function itIsAnInstanceOfRulesReader()
    {
        $mockRules = new RulesReaderStub('rules');

        $priceRules = new PriceRules($mockRules);

        $this->assertInstanceOf(Rules::class, $priceRules);
    }

    /** @test */
    public function itHasAMethodCalledGetPrice()
    {
        $mockRules = new RulesReaderStub('rules');

        $priceRules = new PriceRules($mockRules);

        $this->assertTrue(
            method_exists($priceRules, 'getPrice'),
            'Class PriceRules should contain method getPrice!'
        );
    }

    /** @test */
    public function itShouldHaveAttributePrices()
    {
        $mockRules = new RulesReaderStub('rules');

        $priceRules = new PriceRules($mockRules);

        $this->assertObjectHasAttribute('prices', $priceRules);
    }

    /** @test */
    public function itShouldHaveAttributeSpecialPrices()
    {
        $mockRules = new RulesReaderStub('rules');

        $priceRules = new PriceRules($mockRules);

        $this->assertObjectHasAttribute('specialPrices', $priceRules);
    }
}
