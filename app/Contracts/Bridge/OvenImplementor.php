<?php

declare(strict_types=1);

namespace App\Contracts\Bridge;

use App\Models\Bridge\Pizza;

interface OvenImplementor
{
    public function warpUp(float $temperature);

    public function coolDown(float $temperature);

    public function cookPizza(Pizza $pizza);

    public function getTemperature(): float;

    public function getOvenType(): string;
}
