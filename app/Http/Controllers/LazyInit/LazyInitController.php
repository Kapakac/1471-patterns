<?php

declare(strict_types=1);

namespace App\Http\Controllers\LazyInit;

use App\Http\Controllers\Controller;
use App\Models\LazyInit\PizzaPlace;
use Illuminate\Http\Request;

class LazyInitController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "Ленивая инициализация"
     */
    public function index(Request $request)
    {
        $pizzaPlace = new PizzaPlace();

        $pizzaPlace->getPizza('Margarita');
        $pizzaPlace->getPizza('Milano');

        dd($pizzaPlace);
    }
}
