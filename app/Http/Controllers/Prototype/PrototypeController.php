<?php

declare(strict_types=1);

namespace App\Http\Controllers\Prototype;

use App\Http\Controllers\Controller;
use App\Models\Prototype\Dough;
use App\Models\Prototype\Pizza;
use App\Models\Prototype\Sauce;
use Illuminate\Http\Request;

class PrototypeController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "Прототип"
     */
    public function index(Request $request)
    {
        $dough = new Dough('thin');
        $sauce = new Sauce('tomato');

        $basePizza = new Pizza(name: 'Margarita', dough: $dough, sauce: $sauce);

        $clonePizza = clone $basePizza;
        $clonePizza->toppings = ['double cheese', 'salami', 'garlic'];
        $clonePizza->cookingTime = 10;

        dd($basePizza, $clonePizza);
    }
}
