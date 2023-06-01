<?php

namespace App\Products;

class Ramen extends \App\Products\BatchedProduct
{
    protected string $sku = 'RAMEN';

    protected $hasPriceRules = true;
    protected bool $fractionalSales = false;

    protected float $eachRate = 0.4;
    protected int $batchQuantity = 3;
    protected float $batchRate = 1.00;
}