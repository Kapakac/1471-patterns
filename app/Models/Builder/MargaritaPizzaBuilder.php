<?php

declare(strict_types=1);

namespace App\Models\Builder;

use App\Contracts\Builder\Builder;
use App\Abstracts\Builder\Pizza;

class MargaritaPizzaBuilder implements Builder
{
    private MargaritaPizza $pizza;

    public function __construct()
    {
        $this->pizza = new MargaritaPizza();
    }

    public function prepareDough()
    {
        $this->pizza->dough = 'double';
    }

    public function addSauce()
    {
        $this->pizza->sauce = 'tomato';
    }

    public function addTopping()
    {
        $this->pizza->toppings = ['salami', 'cheese'];
    }

    public function getPizza(): Pizza
    {
        return $this->pizza;
    }
}
