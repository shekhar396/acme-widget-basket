<?php

use PHPUnit\Framework\TestCase;
use Shekhar\AcmeWidgetBasket\Offers\RedWidgetOffer;

class RedWidgetOfferTest extends TestCase
{
    private $catalogue;

    protected function setUp(): void
    {
        $this->catalogue = [
            'R01' => 32.95, // Red
            'G01' => 24.95, // Green
            'B01' => 7.95   // Blue
        ];
    }

    public function testNoRedWidgets()
    {
        $offer = new RedWidgetOffer('R01');
        $items = ['G01', 'B01']; // No red 
        $this->assertEquals(0.0, $offer->apply($items, $this->catalogue));
    }

    public function testOneRedWidget()
    {
        $offer = new RedWidgetOffer('R01');
        $items = ['R01', 'G01']; // Only one red 
        $this->assertEquals(0.0, $offer->apply($items, $this->catalogue));
    }

    public function testTwoRedWidgets()
    {
        $offer = new RedWidgetOffer('R01');
        $items = ['R01', 'R01', 'G01']; // Two red 
        $expectedDiscount = $this->catalogue['R01'] / 2; // half price
        $this->assertEquals($expectedDiscount, $offer->apply($items, $this->catalogue));
    }

    public function testMultipleRedWidgets()
    {
        $offer = new RedWidgetOffer('R01');
        $items = ['R01', 'R01', 'R01', 'R01', 'B01']; // Four red 
        $expectedDiscount = 2 * ($this->catalogue['R01'] / 2); // Two pairs of red widgets
        $this->assertEquals($expectedDiscount, $offer->apply($items, $this->catalogue));
    }
}
