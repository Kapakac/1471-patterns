<?php

declare(strict_types=1);

namespace App\Models\Visitor;

use App\Abstracts\Visitor\ItemElement;

class Coffee extends ItemElement
{
    public function __construct(public string $name, public float $price, public float $capacity)
    {
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCapacity(): float
    {
        return $this->capacity;
    }

    public function accept($visitor): float
    {
        return $visitor->visit($this);
    }
}
