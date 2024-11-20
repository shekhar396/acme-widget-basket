<?php
require '../vendor/autoload.php';

use Shekhar\AcmeWidgetBasket\Basket;
use Shekhar\AcmeWidgetBasket\Delivery\DeliveryCalculator;
use Shekhar\AcmeWidgetBasket\Delivery\DeliveryRules;
use Shekhar\AcmeWidgetBasket\Offers\RedWidgetOffer;

$catalogue = require '../src/Product.php'; // Product catalogue
$deliveryRules = DeliveryRules::getRules();   // Delivery rules 

// Offers
$offers = [
    new RedWidgetOffer('R01') 
];

$deliveryCalculator = new DeliveryCalculator($deliveryRules);
$basket = new Basket($catalogue, $deliveryCalculator, $offers);

// Add products to the basket
$basket->add('R01'); // Red Widget
$basket->add('R01'); // Red Widget
$basket->add('G01'); // Green Widget
$basket->add('B01'); // Blue Widget

// Calculate and print the total cost of the basket
echo "Total: $" . $basket->total(); 