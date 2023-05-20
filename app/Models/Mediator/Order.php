<?php

declare(strict_types=1);

namespace App\Models\Mediator;

use App\Abstracts\Mediator\OrderType;

class Order
{
    public string $orderId;

    public function __construct(public OrderType $type)
    {
        $this->orderId = uniqid();
    }
}
