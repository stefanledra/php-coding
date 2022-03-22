<?php

include 'CoffeeFactory.php';

class CustomerOrder
{
    private string $coffeeType;
    private string $name;
    private string $phoneNumber;

    public function __construct($coffeeType, $name, $phoneNumber)
    {
        $this->coffeeType  = $coffeeType->get();
        $this->name        = $name;
        $this->phoneNumber = $phoneNumber;
    }

    public function getOrder(): array
    {
        return array(
            'name'        => $this->name,
            'phoneNumber' => $this->phoneNumber,
            'coffeeType'  => $this->coffeeType,
        );
    }
}

/*$chosenCoffee = 'Espresso';
$name         = 'Aco';
$phoneNumber  = '555-333';
$coffeeType = (new CoffeeFactory)->brew($chosenCoffee);
if (!is_null($coffeeType)){
    $order      = new CustomerOrder($coffeeType, $name, $phoneNumber);
    $result     = $order->getOrder();
    echo 'Person who ordered: '.$result['name'].'<br />';
    echo 'Provided phone number: '.$result['phoneNumber'].'<br />';
    echo 'Your order: '.$result['coffeeType'];
}else{
    echo 'Invalid type of coffee, please select a valid one and try again!';
}*/

$typesArray = ['Espresso', 'Latte', 'Macchiato', 'Ristretto', 'Mocha'];
foreach ($typesArray as $chosenCoffee) {
    $coffeeType = (new CoffeeFactory())->brew($chosenCoffee);
    echo $chosenCoffee.'<br />';
}
