<?php

namespace App;

use App\Products\Product;

use App\Exceptions\CheckoutExceptions\UnregisteredSkuException;
use App\Exceptions\CheckoutExceptions\InvalidQuantityException;

class Checkout
{
    private $skuDictionary = [];

    private $cart = [];

    public function registerProduct(Product $product, ?string $sku = null): void
    {
        if(is_null($sku) == true)
        {
            $sku = $product->getSku();
        }

        $this->skuDictionary[$sku] = $product;
    }

    public function scan(string $sku, int | float $quantity = 1): string
    {
        if(isset($this->skuDictionary[$sku]) == false)
        {
            throw new UnregisteredSkuException();
        }

        // In the kata description, floats are meant to signifiy a weight while
        // integers are meant to signify per eaches.
        // but if you can't purchase one grape, and must use the weight, then it
        // you can ignore the difference and treat it as some fraction of a unit.

        if(is_int($quantity) == false && $this->skuDictionary[$sku]->fractionalSales() == false)
        {
            throw new InvalidQuantityException();
        }

        if(isset($this->cart[$sku]) == false)
        {
            $this->cart[$sku] = 0;
        }

        $incr = $this->skuDictionary[$sku]->getIncrementalPrice(beginningQuantity: $this->cart[$sku], incrementalQuantity: $quantity);

        $this->cart[$sku] += $quantity;

        return $sku . " | " . $this->skuDictionary[$sku]->formatQuantity($quantity) . " | $" . number_format($incr, 2);
    }
}