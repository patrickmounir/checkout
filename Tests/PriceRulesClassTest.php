<?php

namespace Tests;

use App\Rules\PriceRules;
use App\Rules\Rules;
use PHPUnit\Framework\TestCase;

class PriceRulesClassTest extends TestCase
{
    /** @test */
    public function itIsAnInstanceOfRulesReader()
    {
        $priceRules = new PriceRules();

        $this->assertInstanceOf(Rules::class, $priceRules);
    }

    /** @test */
    public function itHasAMethodCalledGetPrice()
    {
        $priceRules = new PriceRules();

        $this->assertTrue(
            method_exists($priceRules, 'getPrice'),
            'Class PriceRules should contain method getPrice!'
        );
    }
}
