<?php

declare(strict_types=1);

namespace App\Abstracts\Mediator;

enum WorkerType: int
{
    case Waiter = 1;
    case Chief = 2;
    case Barman = 3;
}
