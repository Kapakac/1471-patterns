<?php

declare(strict_types=1);

namespace App\Models\LazyInit;

class Pizza
{
    public function __construct(public string $name)
    {
    }
}
