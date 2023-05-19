<?php

declare(strict_types=1);

namespace App\Http\Controllers\Bridge;

use App\Models\Bridge\ElectricalOvenImplementor;
use App\Models\Bridge\ClassicOvenImplementor;
use App\Http\Controllers\Controller;
use App\Models\Bridge\Pizza;
use Illuminate\Http\Request;
use App\Models\Bridge\Oven;

class BridgeController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "Мост"
     */
    public function index(Request $request)
    {
        $firstPizza = new Pizza(name: 'Margarita', cookTime: 10, temperature: 220);
        $secondPizza = new Pizza(name: 'Salami', cookTime: 9, temperature: 180);

        $implementor = new ClassicOvenImplementor();
        $oven = new Oven($implementor);

        $oven->cookPizza($firstPizza);
        $result[] = [$oven->getImplementorName(), $oven->implementor->info, $oven->pizzaState];
        $oven->cookPizza($secondPizza);
        $result[] = [$oven->getImplementorName(), $oven->implementor->info, $oven->pizzaState];

        $newImplementor = new ElectricalOvenImplementor($oven->getTemperature());

        $firstPizza = new Pizza(name: 'Margarita', cookTime: 9, temperature: 225);
        $secondPizza = new Pizza(name: 'Salami', cookTime: 10, temperature: 175);
        $oven->changeImplementor($newImplementor);

        $oven->cookPizza($firstPizza);
        $result[] = [$oven->getImplementorName(), $oven->implementor->info, $oven->pizzaState];
        $oven->cookPizza($secondPizza);
        $result[] = [$oven->getImplementorName(), $oven->implementor->info, $oven->pizzaState];

        return $result;
    }
}
