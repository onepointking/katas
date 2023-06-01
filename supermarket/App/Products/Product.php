<?php

namespace App\Products;

class Product
{
    protected string $sku = '';
    protected string $friendlyName = '';

    protected bool $fractionalSales = false;

    public function getSku(): string
    {
        if(empty($this->sku) == true)
        {
            throw new \App\Exceptions\ProductExceptions\SkuNotSetException();
        }

        return $this->sku;
    }

    public function getFriendlyName(): string
    {
        if(empty($this->friendlyName) == false)
        {
            return $this->sku;
        }

        return $this->friendlyName;
    }

    public function fractionalSales(): bool
    {
        return $this->fractionalSales;
    }

    public function getincrementalPrice(int | float $beginningQuantity, int | float $incrementalQuantity): float
    {
        throw new \Exception("Not implemented!");
    }

    public function formatQuantity(int | float $quantity)
    {
        return (string)$quantity;
    }
}