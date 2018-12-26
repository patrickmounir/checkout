<?php

namespace Tests;

use App\Rules\PriceRules;
use App\Rules\Rules;
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
    public function itHasAMethodCalledGetTotalPrice()
    {
        $mockRules = new RulesReaderStub('rules');

        $priceRules = new PriceRules($mockRules);

        $this->assertTrue(
            method_exists($priceRules, 'getTotalPrice'),
            'Class PriceRules should contain method getTotalPrice!'
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

    /** @test */
    public function itShouldReturnTheCorrectPriceOfTheQuantityOfAnItem()
    {
        $mockRules = new RulesReaderStub('rules');

        $priceRules = new PriceRules($mockRules);

        $priceRulesFromReader = $mockRules->parseRules();

        $itemName = 'A';

        $itemQuantity = 2;

        $this->assertEquals(
            $priceRulesFromReader['prices'][$itemName] * $itemQuantity,
            $priceRules->getPrice($itemName, $itemQuantity)
        );
    }

    /** @test */
    public function itShouldReturnTheCorrectPriceOfTheQuantityOfAnItemWithSpecialPrice()
    {
        $mockRules = new RulesReaderStub('rules');

        $priceRules = new PriceRules($mockRules);

        $priceRulesFromReader = $mockRules->parseRules();

        $itemName = 'A';

        $itemQuantity = 3;

        $this->assertEquals(
            $priceRulesFromReader['specialPrices'][$itemName][$itemQuantity],
            $priceRules->getPrice($itemName, $itemQuantity)
        );
    }

    /** @test */
    public function itShouldReturnTheCorrectTotalForAllCartWithSpecialPrice()
    {
        $mockRules = new RulesReaderStub('rules');

        $priceRules = new PriceRules($mockRules);

        $priceRulesFromReader = $mockRules->parseRules();

        $cart = [
            'A' => 7,
        ];

        $totalCost = 2 * $priceRulesFromReader['specialPrices']['A'][3] + $priceRulesFromReader['prices']['A'];

        $this->assertEquals(
            $totalCost,
            $priceRules->getTotalPrice($cart)
        );
    }

    /** @test */
    public function itShouldReturnTheCorrectTotalForCart()
    {
        $mockRules = new RulesReaderStub('rules');

        $priceRules = new PriceRules($mockRules);

        $priceRulesFromReader = $mockRules->parseRules();

        $cart = [
            'A' => 1,
        ];

        $totalCost = $priceRulesFromReader['prices']['A'];

        $this->assertEquals(
            $totalCost,
            $priceRules->getTotalPrice($cart)
        );
    }
}
