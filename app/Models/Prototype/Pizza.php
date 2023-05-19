<?php

declare(strict_types=1);

namespace App\Models\Prototype;

class Pizza
{
    public int $cookingTime;

    public function __construct(
        public string $name,
        public Dough  $dough,
        public Sauce  $sauce,
        public array  $toppings = ['cheese'])
    {
    }

    public function __clone()
    {
        $this->name = "Copy of " . $this->name;
    }
}
