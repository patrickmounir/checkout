<?php

namespace Tests;

use App\CheckOut;
use App\Rules\PriceRules;
use App\Rules\Readers\CsvRulesReader;
use PHPUnit\Framework\TestCase;
use Tests\Stubs\RulesReaderStub;
use Tests\Stubs\RulesStub;

class CheckoutClassTest extends TestCase
{
    /** @test */
    public function itHasMethodCalledScan()
    {
        $mockRulesReader = new RulesReaderStub('rules');

        $mockRules = new RulesStub($mockRulesReader);

        $checkout = new CheckOut($mockRules);

        $this->assertTrue(
            method_exists($checkout, 'scan'),
            'Class CheckOut should contain method scan!'
        );
    }

    /** @test */
    public function itHasMethodCalledGetTotal()
    {
        $mockRulesReader = new RulesReaderStub('rules');

        $mockRules = new RulesStub($mockRulesReader);

        $checkout = new CheckOut($mockRules);

        $this->assertTrue(
            method_exists($checkout, 'getTotal'),
            'Class CheckOut should contain method getTotal!'
        );
    }

    /** @test */
    public function itHasAttributeCalledRules()
    {
        $mockRulesReader = new RulesReaderStub('rules');

        $mockRules = new RulesStub($mockRulesReader);

        $checkout = new CheckOut($mockRules);

        $this->assertObjectHasAttribute('rules', $checkout);
    }


    /** @test */
    public function itHasAttributeCalledCheckoutCart()
    {
        $mockRulesReader = new RulesReaderStub('rules');

        $mockRules = new RulesStub($mockRulesReader);

        $checkout = new CheckOut($mockRules);

        $this->assertObjectHasAttribute('checkoutCart', $checkout);
    }

    /** @test */
    public function itHasAttributeCalledTotal()
    {
        $mockRulesReader = new RulesReaderStub('rules');

        $mockRules = new RulesStub($mockRulesReader);

        $checkout = new CheckOut($mockRules);

        $this->assertObjectHasAttribute('total', $checkout);
    }

    /** @test */
    public function itScansAndCalculateTotalIncrementallyCorrectly()
    {
        $csvRulesReader = new CsvRulesReader('rules.csv');

        $priceRules = new PriceRules($csvRulesReader);

        $checkout = new CheckOut($priceRules);

        $this->assertEquals(0, $checkout->getTotal());

        $checkout->scan("A");
        $this->assertEquals(50, $checkout->getTotal());

        $checkout->scan("B");
        $this->assertEquals(80, $checkout->getTotal());

        $checkout->scan("A");
        $this->assertEquals(130, $checkout->getTotal());

        $checkout->scan("A");
        $this->assertEquals(160, $checkout->getTotal());

        $checkout->scan("B");
        $this->assertEquals(175, $checkout->getTotal());
    }

    /** @test */
    public function itScansAndCalculateTotalCorrectly()
    {
        $this->assertEquals(0, $this->price(""));
        $this->assertEquals(50, $this->price("A"));
        $this->assertEquals(80, $this->price("AB"));
        $this->assertEquals(115, $this->price("CDBA"));

        $this->assertEquals(100, $this->price("AA"));
        $this->assertEquals(130, $this->price("AAA"));
        $this->assertEquals(180, $this->price("AAAA"));
        $this->assertEquals(230, $this->price("AAAAA"));
        $this->assertEquals(260, $this->price("AAAAAA"));

        $this->assertEquals(160, $this->price("AAAB"));
        $this->assertEquals(175, $this->price("AAABB"));
        $this->assertEquals(190, $this->price("AAABBD"));
        $this->assertEquals(190, $this->price("DABABA"));
    }

    private function price($itemSequence)
    {
        $csvRulesReader = new CsvRulesReader('rules.csv');

        $priceRules = new PriceRules($csvRulesReader);

        $checkout = new CheckOut($priceRules);

        if ($itemSequence === "") {
            return $checkout->getTotal();
        }
        $itemsArray = str_split($itemSequence);

        foreach ($itemsArray as $item) {
            $checkout->scan($item);
        }

        return $checkout->getTotal();
    }
}
