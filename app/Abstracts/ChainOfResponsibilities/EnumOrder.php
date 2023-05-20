<?php

declare(strict_types=1);

namespace App\Abstracts\ChainOfResponsibilities;

enum EnumOrder: int
{
    case Vegan = 1;
    case NotVegan = 2;
    case Binge = 3;
    case NotOrder = 4;
}
