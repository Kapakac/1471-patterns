<?php

declare(strict_types=1);

namespace App\Models\Visitor;

use App\Abstracts\Visitor\OrderItemVisitor;

class OnlyCoffeeDiscountVisitor extends OrderItemVisitor
{
    const SALE = 0.35;

    public function visit($item): float
    {
        $cost = 0;
        if ($item instanceof Pizza) {
            $cost = $item->getPrice();
        } else if ($item instanceof Coffee) {
            $cost = $item->getCapacity() * $item->getPrice();
            $cost -= $cost * self::SALE;
        }

        return $cost;
    }
}
