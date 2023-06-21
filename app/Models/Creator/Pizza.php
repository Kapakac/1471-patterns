<?php

declare(strict_types=1);

namespace App\Models\Creator;

class Pizza
{
    public function __construct(public string $name, public float $price)
    {
    }
}
