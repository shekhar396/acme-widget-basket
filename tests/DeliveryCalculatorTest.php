<?php

use PHPUnit\Framework\TestCase;
use Shekhar\AcmeWidgetBasket\Delivery\DeliveryCalculator;

class DeliveryCalculatorTest extends TestCase
{
    private $rules; 

    protected function setUp(): void
    {
        $this->rules = [
            50 => 4.95,
            90 => 2.95,
            PHP_INT_MAX => 0.00,
        ];
    }

    public function testDeliveryCostBelow50()
    {
        $calculator = new DeliveryCalculator($this->rules);
        $this->assertEquals(4.95, $calculator->calculate(45.00));
    }

    public function testDeliveryCostBelow90()
    {
        $calculator = new DeliveryCalculator($this->rules);
        $this->assertEquals(2.95, $calculator->calculate(70.00));
    }

    public function testFreeDelivery()
    {
        $calculator = new DeliveryCalculator($this->rules);
        $this->assertEquals(0.00, $calculator->calculate(100.00));
    }
}
