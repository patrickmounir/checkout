<?php

namespace Tests;

use App\CheckOut;
use PHPUnit\Framework\TestCase;

class CheckoutClassTest extends TestCase
{
    /** @test */
    public function itHasMethodCalledScan()
    {
        $checkout = new CheckOut();

        $this->assertTrue(
            method_exists($checkout, 'scan'),
            'Class CheckOut should contain method scan!'
        );
    }

    /** @test */
    public function itHasMethodCalledPrice()
    {
        $checkout = new CheckOut();

        $this->assertTrue(
            method_exists($checkout, 'price'),
            'Class CheckOut should contain method price!'
        );
    }
}
