<?php

class Ristretto
{
    protected string $name;
    use CoffeeType;

    public function __construct($name)
    {
        $this->name = $name;
    }
}
