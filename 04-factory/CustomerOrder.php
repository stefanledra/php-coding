<?php

include 'CoffeeFactory.php';

class CustomerOrder
{
    private string $coffeeType;

    public function __construct(object $coffeeType)
    {
        $this->coffeeType = $coffeeType->getType();
    }

    public function orderComplete()
    {
        echo 'Your order is confirmed, we are preparing your '.$this->coffeeType.'!<br />';
        echo 'Your '.$this->coffeeType.' is ready! Thank you for using our services! <br />';
    }
}

$chosenType    = 'Ristretto';
$orderedCoffee = (new CoffeeFactory())->brew($chosenType);
$order         = new CustomerOrder($orderedCoffee);
$order->orderComplete();
echo 'Other available types of coffee we offer: ';
$availableCoffee = array('Latte', 'Mocha', 'Espresso', 'Macchiato', 'Ristretto');

foreach ($availableCoffee as $coffeeType) {
    $result = (new CoffeeFactory())->brew($coffeeType);
    echo $result->getType().' ';
}
