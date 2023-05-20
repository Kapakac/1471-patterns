<?php

declare(strict_types=1);

namespace App\Models\Visitor;

use App\Abstracts\Visitor\OrderItemVisitor;

class Waiter
{
    public array $orders = [];
    public OrderItemVisitor $discountCalc;

    public function __construct(public OrderItemVisitor $discount)
    {
        $this->discountCalc = $discount;
    }

    public function setOrder( $orders): void
    {
        $this->orders = $orders;
    }

    public function setDiscount(OrderItemVisitor $discount): void
    {
        $this->discountCalc = $discount;
    }

    public function calcFinishPrice(): float
    {
        $price = 0;
        foreach ($this->orders as $orderItem) {
            $price += $orderItem->accept($this->discountCalc);
        }

        return $price;
    }
}
