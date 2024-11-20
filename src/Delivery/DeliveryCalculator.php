<?php

namespace Shekhar\AcmeWidgetBasket\Delivery;

class DeliveryCalculator
{
    private array $deliveryRules;

    /**
     * Constructor 
     *
     * @param array $deliveryRules
     */
    public function __construct(array $deliveryRules)
    {
        $this->deliveryRules = $deliveryRules;
    }

    /**
     * Calculate the delivery cost 
     *
     * @param float $totalAfterDiscount
     * @return float
     */
    public function calculate(float $totalAfterDiscount): float
    {
        foreach ($this->deliveryRules as $threshold => $cost) {
            if ($totalAfterDiscount < $threshold) {
                return $cost;
            }
        }
        return 0.0; // For orders $90 or more 
    }
}
