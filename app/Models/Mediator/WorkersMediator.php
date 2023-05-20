<?php

declare(strict_types=1);

namespace App\Models\Mediator;

use App\Abstracts\Mediator\Event;
use App\Abstracts\Mediator\OrderType;
use App\Abstracts\Mediator\Worker;
use App\Abstracts\Mediator\WorkerType;
use App\Contracts\Mediator\Mediator;
use Illuminate\Support\Arr;

class WorkersMediator implements Mediator
{
    public array $workers;

    public function __construct()
    {
        $keys = [WorkerType::Waiter->name, WorkerType::Chief->name, WorkerType::Barman->name];
        foreach ($keys as $key) {
            $this->workers[$key] = [];
        }
    }

    public function notify(Worker $worker, Order $order, Event $event)
    {
        if ($event === Event::GetOrder && $worker->type() === WorkerType::Waiter) {
            if ($order->type === OrderType::Food) {
                $chiefs = $this->workers[WorkerType::Chief->name];
                $chiefId = array_rand($chiefs, 1);
                $chiefs[$chiefId]->takeOrder($order);
            } else {
                $barmans = $this->workers[WorkerType::Barman->name];
                $barmanId = array_rand($barmans, 1);
                $barmans[$barmanId]->takeOrder($order);
            }
        } else if ($event === Event::FinishOrder &&
            $worker->type() === WorkerType::Barman ||
            $worker->type() === WorkerType::Chief) {
            foreach ($this->workers[WorkerType::Waiter->name] as $waiter) {
                if (in_array($order->orderId, $waiter->getOrdersId())) {
                    $waiter->finishOrder($order);
                    break;
                } else {
                    $waiter->info = 'Заказ не доставлен';
                }
            }
        }
    }

    public function addWorker(Worker $worker): void
    {
        if (!in_array($worker->id, $this->workers[$worker->type()->name])) {
            $this->workers[$worker->type()->name][$worker->id] = $worker;
        }
    }
}
