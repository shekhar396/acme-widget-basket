<?php
namespace Shekhar\AcmeWidgetBasket\Delivery;

class DeliveryRules
{
    public static function getRules(): array
    {
        return [
            50 => 4.95,
            90 => 2.95,
            PHP_INT_MAX => 0.00
        ];
    }
}
