<?php

class Latte
{
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function get(): string
    {
        return $this->name;
    }
}

class Macchiato
{
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function get(): string
    {
        return $this->name;
    }
}

class Espresso
{
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function get(): string
    {
        return $this->name;
    }
}

class Ristretto
{
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function get(): string
    {
        return $this->name;
    }
}

class Mocha
{
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function get(): string
    {
        return $this->name;
    }
}


class CoffeeFactory
{
    public function brew(string $chosenCoffee)
    {
        switch ($chosenCoffee) {
            case 'Latte':
                $resultObject = new Latte('Latte');
                break;
            case 'Macchiato':
                $resultObject = new Macchiato('Macchiato');
                break;
            case 'Espresso':
                $resultObject = new Espresso('Espresso');
                break;
            case 'Ristretto':
                $resultObject = new Ristretto('Ristretto');
                break;
            case 'Mocha':
                $resultObject = new Mocha('Mocha');
                break;
            default:
                $resultObject = null;
        }

        return $resultObject;
    }
}
