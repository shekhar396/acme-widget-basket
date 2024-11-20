<?php

use PHPUnit\Framework\TestCase;
use Shekhar\AcmeWidgetBasket\Basket;
use Shekhar\AcmeWidgetBasket\Delivery\DeliveryCalculator;
use Shekhar\AcmeWidgetBasket\Offers\RedWidgetOffer;

class BasketTest extends TestCase
{
    private $catalogue;
    private $deliveryRules;
    private $deliveryCalculator;
    private $offers;

    protected function setUp(): void
    {
        $this->catalogue = [
            'R01' => 32.95,
            'G01' => 24.95,
            'B01' => 7.95,
        ];

        $this->deliveryRules = [
            50 => 4.95,
            90 => 2.95,
            PHP_INT_MAX => 0.00,
        ];

        $this->deliveryCalculator = new DeliveryCalculator($this->deliveryRules);

        $this->offers = [
            new RedWidgetOffer('R01'),
        ];
    }

    public function testBasketTotalWithMultipleProducts()
    {
        $basket = new Basket($this->catalogue, $this->deliveryCalculator, $this->offers);

        $basket->add('R01'); // Red Widget
        $basket->add('R01'); // Red Widget
        $basket->add('R01'); // Red Widget
        $basket->add('B01'); // Blue Widget
        $basket->add('B01'); // Blue Widget

        $this->assertEquals(98.28, $basket->total());
    }

    public function testBasketTotalWithoutOffers()
    {
        $basket = new Basket($this->catalogue, $this->deliveryCalculator, []);

        $basket->add('B01'); // Blue Widget
        $basket->add('G01'); // Green Widget

        $this->assertEquals(37.85, $basket->total());
    }
}
