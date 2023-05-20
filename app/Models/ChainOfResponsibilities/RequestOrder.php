<?php

declare(strict_types=1);

namespace App\Models\ChainOfResponsibilities;

use App\Abstracts\ChainOfResponsibilities\EnumOrder;

class RequestOrder
{
    public function __construct(public array $description, public EnumOrder $orderType)
    {
    }

    public function getDescription(): array
    {
        return $this->description;
    }

    public function getOrderType(): EnumOrder
    {
        return $this->orderType;
    }
}

