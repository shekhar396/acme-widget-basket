<?php

namespace Shekhar\AcmeWidgetBasket;

use Shekhar\AcmeWidgetBasket\Delivery\DeliveryCalculator;

class Basket implements BasketInterface
{
    private array $catalogue;
    private DeliveryCalculator $deliveryCalculator;
    private array $offers;
    private array $items = [];

    /**
     * Initialize the basket
     *
     * @param array $catalogue
     * @param DeliveryCalculator $deliveryCalculator
     * @param array $offers
     */
    public function __construct(array $catalogue, DeliveryCalculator $deliveryCalculator, array $offers)
    {
        $this->catalogue = $catalogue;
        $this->deliveryCalculator = $deliveryCalculator;
        $this->offers = $offers;
    }

    /**
     * Add a product to the basket
     *
     * @param string $productCode
     * @return void
     * @throws \InvalidArgumentException
     */
    public function add(string $productCode): void
    {
        if (!array_key_exists($productCode, $this->catalogue)) {
            throw new \InvalidArgumentException("Invalid product code: {$productCode}");
        }
        $this->items[] = $productCode;
    }

    /**
     * Calculate and return the total including discounts and delivery.
     *
     * @return float
     */
    public function total(): float
    {
        $subtotal = $this->calculateSubtotal();
        $discount = $this->applyOffers();
        $totalAfterDiscount = $subtotal - $discount;
        $delivery = $this->deliveryCalculator->calculate($totalAfterDiscount);

        return round($totalAfterDiscount + $delivery, 2);
    }

    /**
     * Calculate the subtotal
     *
     * @return float
     */
    private function calculateSubtotal(): float
    {
        $subtotal = 0.0;
        foreach ($this->items as $itemCode) {
            $subtotal += $this->catalogue[$itemCode];
        }
        return $subtotal;
    }

    /**
     * Apply offers and return the total discount.
     *
     * @return float
     */
    private function applyOffers(): float
    {
        $discount = 0.0;
        foreach ($this->offers as $offer) {
            $discount += $offer->apply($this->items, $this->catalogue);
        }
        return $discount;
    }
}
