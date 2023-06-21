<?php

declare(strict_types=1);

namespace App\Models\InformationExpert;

class Pizza
{
    public function __construct(public string $name, public float $price)
    {
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
