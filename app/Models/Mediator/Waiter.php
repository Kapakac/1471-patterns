<?php

declare(strict_types=1);

namespace App\Models\Mediator;

use App\Abstracts\Mediator\WorkerType;
use App\Abstracts\Mediator\Worker;
use App\Abstracts\Mediator\Event;

class Waiter extends Worker
{
    public function takeOrder(Order $order): void
    {
        $this->orders[$order->orderId] = $order;
        $this->mediator->notify(worker: $this, order: $order, event: Event::GetOrder);
        $this->info = 'Официант ' . $this->name . ' принял ' . $order->orderId;
    }

    public function finishOrder(Order $order): void
    {
        unset($this->orders[$order->orderId]);
        $this->info = 'Официант ' . $this->name . ' отнёс ' . $order->orderId;
    }

    public function type(): WorkerType
    {
        return WorkerType::Waiter;
    }
}
