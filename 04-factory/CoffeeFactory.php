<?php

include_once 'coffee-types/Latte.php';
include_once 'coffee-types/Mocha.php';
include_once 'coffee-types/Espresso.php';
include_once 'coffee-types/Macchiato.php';
include_once 'coffee-types/Ristretto.php';

class CoffeeFactory
{
    public function brew(string $chosenCoffee): object
    {
        return match ($chosenCoffee) {
            'Latte' => new Latte($chosenCoffee),
            'Macchiato' => new Macchiato($chosenCoffee),
            'Espresso' => new Espresso($chosenCoffee),
            'Ristretto' => new Ristretto($chosenCoffee),
            'Mocha' => new Mocha($chosenCoffee),
        };
    }
}
