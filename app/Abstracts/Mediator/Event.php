<?php

declare(strict_types=1);

namespace App\Abstracts\Mediator;

enum Event: int
{
    case GetOrder = 1;
    case FinishOrder = 2;
}
