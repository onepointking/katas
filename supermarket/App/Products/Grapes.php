<?php

namespace App\Products;

class Grapes extends \App\Products\Product
{
    protected string $sku = 'GRAPES';

    protected $unitPrice = 4.00;

    protected $hasPriceRules = true;
    protected bool $fractionalSales = true;

    public function getIncrementalPrice(int | float $beginningQuantity, int | float $incrementalQuantity): float
    {
        return $this->unitPrice * $incrementalQuantity;
    }

    public function formatQuantity(int | float $quantity)
    {
        return $quantity . " lbs";
    }
}