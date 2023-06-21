<?php

declare(strict_types=1);

namespace App\Models\Creator;

final class ShoppingCart
{
    private array $items = [];

    public function addPizza(string $name, float $price): void
    {
        $this->items[] = new Pizza($name, $price);
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
