<?php

declare(strict_types=1);

namespace App\Abstracts\Mediator;

enum OrderType: int
{
    case Food = 1;
    case Binge = 2;
}
