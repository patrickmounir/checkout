<?php

namespace Tests;

use App\CheckOut;
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
    public function itHasMethodCalledPrice()
    {
        $mockRulesReader = new RulesReaderStub('rules');

        $mockRules = new RulesStub($mockRulesReader);

        $checkout = new CheckOut($mockRules);

        $this->assertTrue(
            method_exists($checkout, 'price'),
            'Class CheckOut should contain method price!'
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
}
