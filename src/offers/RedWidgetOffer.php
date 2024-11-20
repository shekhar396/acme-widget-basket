<?php

namespace Shekhar\AcmeWidgetBasket\Offers;

class RedWidgetOffer implements OfferInterface
{
    private string $productCode;

    /**
     * Constructor 
     *
     * @param string $productCode
     */
    public function __construct(string $productCode)
    {
        $this->productCode = $productCode;
    }

    /**
     * Apply the offer and return the discount amount.
     * Buy one, get the second half price - offer.
     *
     * @param array $items
     * @param array $catalogue
     * @return float
     */
    public function apply(array $items, array $catalogue): float
    {
        $count = array_count_values($items)[$this->productCode] ?? 0;
        $discount = 0.0;
        
        if ($count >= 2) {
            $pairs = intdiv($count, 2);
            $discount = $pairs * ($catalogue[$this->productCode] / 2);
        }

        return $discount;
    }
}
