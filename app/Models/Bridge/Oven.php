<?php

declare(strict_types=1);

namespace App\Models\Bridge;

use App\Contracts\Bridge\OvenImplementor;

class Oven
{
    public string $ovenState;
    public string $pizzaState;

    public function __construct(public OvenImplementor $implementor)
    {
    }

    private function prepareStove(float $temperature): void
    {
        if ($this->implementor->getTemperature() > $temperature) {
            $this->implementor->coolDown($temperature);
        } elseif ($this->implementor->getTemperature() < $temperature) {
            $this->implementor->warpUp($temperature);
        } else {
            $this->ovenState = 'Ideal temperature, oven prepared';
        }
    }

    public function cookPizza(Pizza $pizza): void
    {
        $this->prepareStove($pizza->temperature);

        $this->pizzaState = "Cooking $pizza->name pizza for $pizza->cookTime minutes at $pizza->temperature C. ";

        $this->implementor->cookPizza($pizza);

        $pizza->isCooked() ? $this->pizzaState .= 'Pizza is ready!' : $this->pizzaState .= 'Some wrong.';
    }

    public function changeImplementor(OvenImplementor $implementor): void
    {
        $this->implementor = $implementor;
    }

    public function getTemperature(): float
    {
        return $this->implementor->getTemperature();
    }

    public function getImplementorName(): string
    {
        return $this->implementor->getOvenType();
    }
}
