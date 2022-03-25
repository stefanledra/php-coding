<?php

include_once 'CoffeeType.php';

class Espresso extends CoffeeType
{
    protected string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}
