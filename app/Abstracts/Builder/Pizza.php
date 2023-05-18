<?php

declare(strict_types=1);

namespace App\Abstracts\Builder;

abstract class Pizza
{
    public string $name;
    public string $dough;
    public string $sauce;
    public array $toppings;
    public int $cookingTime;
}
