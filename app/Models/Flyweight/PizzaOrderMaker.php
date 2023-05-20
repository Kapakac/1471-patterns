<?php

declare(strict_types=1);

namespace App\Models\Flyweight;

class PizzaOrderMaker
{
    public function __construct(public FlyWeightFactory $flyWeightFactory, public array $contexts = [])
    {
    }

    public function makePizzaOrder($uniqueState, $sharedState): PizzaOrderContext
    {
        $flyWeight = $this->flyWeightFactory->getFlyweight($sharedState);

        $context = new PizzaOrderContext($uniqueState, $flyWeight);

        $this->contexts[] = $context;

        return $context;
    }
}
