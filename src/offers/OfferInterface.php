<?php

namespace Shekhar\AcmeWidgetBasket\Offers;

/**
 * Interface for defining offer rules.
 */
interface OfferInterface
{
    /**
     * Apply the offer and return the discount amount.
     *
     * @param array $items
     * @param array $catalogue
     * @return float
     */
    public function apply(array $items, array $catalogue): float;
}
