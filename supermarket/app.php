<?php

include "autoloader.php";


$checkout = new \App\Checkout();
$checkout->registerProduct(new \App\Products\Grapes());
$checkout->registerProduct(new \App\Products\Orange());
$checkout->registerProduct(new \App\Products\Ramen());
$checkout->registerProduct(new \App\Products\Soup());
$checkout->registerProduct(new \App\Products\Yogurt());

echo $checkout->scan('SOUP', 1) . PHP_EOL;
echo $checkout->scan('RAMEN', 2) . PHP_EOL;
echo $checkout->scan('GRAPES', 0.3) . PHP_EOL;
echo $checkout->scan('SOUP', 1) . PHP_EOL;
echo $checkout->scan('ORANGE', 1) . PHP_EOL;
echo $checkout->scan('RAMEN', 1) . PHP_EOL;
echo $checkout->scan('SOUP', 1) . PHP_EOL;
echo $checkout->scan('YOGURT', 2) . PHP_EOL;
echo $checkout->scan('YOGURT', 1) . PHP_EOL;