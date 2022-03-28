<?php

class Macchiato
{
    protected string $name;
    use CoffeeType;

    public function __construct($name)
    {
        $this->name = $name;
    }
}
