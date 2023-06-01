<?php

namespace App\Products;

class Yogurt extends \App\Products\BatchedProduct
{
    protected string $sku = 'YOGURT';

    protected $hasPriceRules = true;
    protected bool $fractionalSales = false;

    protected float $eachRate = 0.67;
    protected int $batchQuantity = 3;
    protected float $batchRate = 2.00;
}