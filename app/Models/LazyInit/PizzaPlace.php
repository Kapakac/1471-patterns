<?php

declare(strict_types=1);

namespace App\Models\LazyInit;

class PizzaPlace
{
    public array $pizzas = [];

    public function getPizza(string $name): Pizza
    {
        if (!in_array($name, $this->pizzas)) {
            $this->pizzas[$name] = new Pizza($name);
        }

        return $this->pizzas[$name];
    }
}
