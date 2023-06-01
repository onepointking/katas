<?php

namespace App\Products;

use App\Exceptions\ProductExceptions\BatchQuantityNotSetException;
use App\Exceptions\ProductExceptions\BatchRateNotSetException;
use App\Exceptions\ProductExceptions\EachRateNotSetException;

class BatchedProduct extends Product
{
    protected float $eachRate = -1;
    protected int $batchQuantity = -1;
    protected float $batchRate = -1;

    public function getIncrementalPrice(int | float $beginningQuantity, int | float $incrementalQuantity): float
    {
        return $this->getQuantityPrice($beginningQuantity + $incrementalQuantity) - $this->getQuantityPrice($beginningQuantity);
    }

    public function getQuantityPrice(int | float $quantity): float
    {
        if(($this->eachRate) == -1)
        {
            throw new EachRateNotSetException();
        }

        if(($this->batchQuantity) == -1)
        {
            throw new BatchQauntityNotSetException();
        }

        if(($this->batchRate) == -1)
        {
            throw new BatchRateNotSetException();
        }
        $atFullPrice = ($quantity % $this->batchQuantity);
        $atDiscountedPrice = $quantity - $atFullPrice;
        
        $price = $atFullPrice * $this->eachRate;
        $price += (($atDiscountedPrice / $this->batchQuantity) * $this->batchRate);
        return $price;
    }
}