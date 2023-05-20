<?php

declare(strict_types=1);

namespace App\Models\Mediator;

use App\Abstracts\Mediator\WorkerType;
use App\Abstracts\Mediator\Worker;
use App\Abstracts\Mediator\Event;

class Chief extends Worker
{
    public function takeOrder(Order $order): void
    {
        $this->orders[$order->orderId] = $order;
        $this->info = 'Шеф ' . $this->name . ' принял ' . $order->orderId;
    }

    public function finishOrder(Order $order): void
    {
        $this->mediator->notify(worker: $this, order: $order, event: Event::FinishOrder);
        $this->info = 'Шеф ' . $this->name . ' выполнил ' . $order->orderId;
    }

    public function processOrder()
    {
        if ($this->orders) {
            $order = end($this->orders);
            $this->finishOrder($order);
            $this->info = 'Шеф ' . $this->name . ' выполняет ' . $order->orderId;
        } else {
            $this->info = 'Шеф ' . $this->name . ' от нечего делать шинкует капусту';
        }
    }

    public function type(): WorkerType
    {
        return WorkerType::Chief;
    }
}
