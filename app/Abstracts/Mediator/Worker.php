<?php

declare(strict_types=1);

namespace App\Abstracts\Mediator;

use App\Contracts\Mediator\Mediator;
use App\Models\Mediator\Order;

abstract class Worker
{
    public string $id;
    public array $orders = [];
    public string $info;

    public function __construct(public string $name, public Mediator $mediator)
    {
        $this->id = uniqid();
        $this->mediator->addWorker($this);
    }

    abstract function takeOrder(Order $order): void;

    abstract function finishOrder(Order $order): void;

    abstract function type(): WorkerType;

    public function getOrdersId(): array
    {
        return $this->orders;
    }
}
