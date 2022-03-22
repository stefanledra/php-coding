<?php

interface CoffeeTypes
{
}

class Latte implements CoffeeTypes
{
    public string $name;
}

class Macchiato implements CoffeeTypes
{
    public string $name;
}

class Espresso implements CoffeeTypes
{
    public string $name;
}

class Ristretto implements CoffeeTypes
{
    public string $name;
}

class Mocha implements CoffeeTypes
{
    public string $name;
}


class CoffeeFactory
{
    public function brew(string $chosenCoffee)
    {
        switch ($chosenCoffee) {
            case 'Latte':
                $resultObject       = new Latte();
                $resultObject->name = 'Latte';
                break;
            case 'Macchiato':
                $resultObject       = new Macchiato();
                $resultObject->name = 'Macchiato';
                break;
            case 'Espresso':
                $resultObject       = new Espresso();
                $resultObject->name = 'Espresso';
                break;
            case 'Ristretto':
                $resultObject       = new Ristretto();
                $resultObject->name = 'Ristretto';
                break;
            case 'Mocha':
                $resultObject       = new Mocha();
                $resultObject->name = 'Mocha';
                break;
        }
        if (isset($resultObject)) {
            return $resultObject;
        } else {
            throw new Exception('Can not create your order! Please input the valid coffee type!');
        }
    }
}
