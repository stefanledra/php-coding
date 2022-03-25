<?php

abstract class CoffeeType
{
    public function getType(): string
    {
        return $this->name;
    }
}
