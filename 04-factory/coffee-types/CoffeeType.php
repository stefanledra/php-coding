<?php

trait CoffeeType
{
    public function getType(): string
    {
        return $this->name;
    }
}
