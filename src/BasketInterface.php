<?php

namespace Shekhar\AcmeWidgetBasket;

interface BasketInterface
{
    /**
     * Add a product to the basket by its product code.
     *
     * @param string $productCode
     * @return void
     */
    public function add(string $productCode): void;

    /**
     * Calculate and return the total cost of the basket.
     *
     * @return float
     */
    public function total(): float;
}
