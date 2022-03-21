<?php

include 'CoffeeFactory.php';

class CustomerOrder extends CoffeeFactory
{
    public string $coffeeType;

    public function getOrder(): string
    {
        return $this->coffeeType;
    }
}

$chosenCoffee = 'Latte';
try {
    $factory = new CoffeeFactory();
    $order   = $factory->brew($chosenCoffee);
    echo $order->getOrder();
} catch (Exception $e) {
    echo $e->getMessage();
}
