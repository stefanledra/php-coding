<?php

include 'CoffeeFactory.php';

class CustomerOrder
{
    public string $coffeeType;
    public string $name;
    public string $phoneNumber;

    public function __construct(CoffeeTypes $chosenCoffee, $name, $phoneNumber)
    {
        $this->coffeeType  = $chosenCoffee->name;
        $this->name        = $name;
        $this->phoneNumber = $phoneNumber;
    }

    public function getOrder(): string
    {
        return $this->coffeeType;
    }
}

$chosenCoffee = 'Espresso';
$name         = 'Aco';
$phoneNumber  = '555-333';
try {
    $factory    = new CoffeeFactory();
    $coffeeType = $factory->brew($chosenCoffee);
    $order      = new CustomerOrder($coffeeType, $name, $phoneNumber);
    echo 'Person who ordered: '.$order->name.'<br />';
    echo 'Provided phone number: '.$order->phoneNumber.'<br />';
    echo 'Your order: '.$order->coffeeType;
} catch (Exception $e) {
    echo $e->getMessage();
}
