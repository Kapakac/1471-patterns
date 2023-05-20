<?php

declare(strict_types=1);

namespace App\Models\Flyweight;

class PizzaOrderContext
{
    public function __construct(public string $uniqueState, public PizzaOrderFlyWeight $flyweight)
    {
    }
}
