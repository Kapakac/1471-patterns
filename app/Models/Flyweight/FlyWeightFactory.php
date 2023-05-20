<?php

declare(strict_types=1);

namespace App\Models\Flyweight;

class FlyWeightFactory
{
    public array $flyweights;

    public function getFlyweight(string $sharedState): PizzaOrderFlyWeight
    {
        if (isset($this->flyweights[$sharedState])) {
            return $this->flyweights[$sharedState];
        } else {
            $flyweight = new PizzaOrderFlyWeight($sharedState);
            $this->flyweights[$sharedState] = $flyweight;

            return $flyweight;
        }
    }

    public function getTotal(): int
    {
        return count($this->flyweights);
    }
}
