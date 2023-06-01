<?php

namespace App\Products;

class Soup extends \App\Products\BatchedProduct
{
    protected string $sku = 'SOUP';

    protected $hasPriceRules = true;
    protected bool $fractionalSales = false;

    protected float $eachRate = 1.00;
    protected int $batchQuantity = 3;
    protected float $batchRate = 2.00;
}