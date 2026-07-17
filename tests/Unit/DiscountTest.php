<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class DiscountTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_discount_calculation()
{
    $price = 1000;
    $discount = 10;

    $total = $price - ($price * $discount / 100);

    $this->assertEquals(900, $total);

}
}
