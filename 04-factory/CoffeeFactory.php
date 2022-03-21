<?php

class CoffeeFactory
{
    public function brew(string $chosenCoffee)
    {
        switch ($chosenCoffee) {
            case "Latte":
                $obj             = new CustomerOrder();
                $obj->coffeeType = "Latte";
                break;
            case "Macchiato":
                $obj             = new CustomerOrder();
                $obj->coffeeType = "Macchiato";
                break;
            case "Espresso":
                $obj             = new CustomerOrder();
                $obj->coffeeType = "Espresso";
                break;
            case "Ristretto":
                $obj             = new CustomerOrder();
                $obj->coffeeType = "Ristretto";
                break;
            case "Mocha":
                $obj             = new CustomerOrder();
                $obj->coffeeType = "Mocha";
                break;
            default:
        }
        if (isset($obj)) {
            return $obj;
        } else {
            throw new Exception('Can not create your order! Please input the valid coffee type!');
        }
    }
}
