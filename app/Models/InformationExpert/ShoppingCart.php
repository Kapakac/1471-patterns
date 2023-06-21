<?php

declare(strict_types=1);

namespace App\Models\InformationExpert;

final class ShoppingCart
{
    public function __construct(public array $items)
    {
    }

    public function getTotalPrice(): float
    {
        return array_reduce($this->items, function ($sum, $item) {
            return $sum + $item->getPrice();
        }, 0);
    }
}
