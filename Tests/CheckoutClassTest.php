<?php

namespace Tests;

use App\CheckOut;
use PHPUnit\Framework\TestCase;

class CheckoutClassTest extends TestCase
{
    /** @test */
    function itHasMethodCalledScan()
    {
        $checkout = new CheckOut();

        $this->assertTrue(
            method_exists($checkout, 'scan'),
            'Class CheckOut should contain method scan!'
        );
    }
}
