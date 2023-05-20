<?php

declare(strict_types=1);

namespace App\Contracts\Mediator;

use App\Abstracts\Mediator\Worker;
use App\Abstracts\Mediator\Event;
use App\Models\Mediator\Order;

interface Mediator
{
    public function notify(Worker $worker, Order $order, Event $event);

    public function addWorker(Worker $worker): void;
}
