<?php

declare(strict_types=1);

namespace App\Models\Visitor;

use App\Abstracts\Visitor\OrderItemVisitor;

class OnlyPizzaDiscountVisitor extends OrderItemVisitor
{
    const SALE = 0.15;

    public function visit($item): float
    {
        $cost = 0;
        if ($item instanceof Pizza) {
            $cost = $item->getPrice();
            $cost -= $cost * self::SALE;
        } else if ($item instanceof Coffee) {
            $cost = $item->getCapacity() * $item->getPrice();
        }

        return $cost;
    }
}
