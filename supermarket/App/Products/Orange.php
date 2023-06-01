<?php

namespace App\Products;

class Orange extends \App\Products\Product
{
    protected string $sku = 'ORANGE';

    protected $unitPrice = 2.00;

    protected bool $fractionalSales = false;

    public function getIncrementalPrice(int | float $beginningQuantity, int | float $incrementalQuantity): float
    {
        return $this->unitPrice * $incrementalQuantity;
    }
}