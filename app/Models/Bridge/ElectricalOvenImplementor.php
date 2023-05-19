<?php

declare(strict_types=1);

namespace App\Models\Bridge;

use App\Contracts\Bridge\OvenImplementor;

class ElectricalOvenImplementor implements OvenImplementor
{
    private string $type;
    public string $info;

    public function __construct(public float $temperature = 0)
    {
        $this->type = 'ElectricalStove';
    }

    public function warpUp(float $temperature)
    {
        $this->info = 'Temperature warm up from ' . $this->temperature . ' to ' . $temperature;

        $this->temperature = $temperature;
    }

    public function coolDown(float $temperature)
    {
        $this->info = 'Temperature cool down from ' . $this->temperature . ' to ' . $temperature;

        $this->temperature = $temperature;
    }

    public function cookPizza(Pizza $pizza)
    {
        $pizza->cook();
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getOvenType(): string
    {
        return $this->type;
    }
}
