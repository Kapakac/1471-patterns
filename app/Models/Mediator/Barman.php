<?php

declare(strict_types=1);

namespace App\Models\Mediator;

use App\Abstracts\Mediator\WorkerType;
use App\Abstracts\Mediator\Worker;
use App\Abstracts\Mediator\Event;

class Barman extends Worker
{
    public function takeOrder(Order $order): void
    {
        $this->orders[$order->orderId] = $order;
        $this->info = 'Бармен ' . $this->name . ' принял ' . $order->orderId;
    }

    public function finishOrder(Order $order): void
    {
        $this->mediator->notify(worker: $this, order: $order, event: Event::FinishOrder);
        $this->info = 'Бармен ' . $this->name . ' выполнил ' . $order->orderId;
    }

    public function processOrder()
    {
        if ($this->orders) {
            $order = end($this->orders);
            $this->finishOrder($order);
            $this->info = 'Бармен ' . $this->name . ' выполняет ' . $order->orderId;
        } else {
            $this->info = 'Бармен ' . $this->name . ' грустно разводит руками';
        }
    }


    public function type(): WorkerType
    {
        return WorkerType::Barman;
    }
}
