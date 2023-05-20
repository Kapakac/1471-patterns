<?php

declare(strict_types=1);

namespace App\Http\Controllers\Memento;

use App\Http\Controllers\Controller;
use App\Models\Memento\Chief;
use App\Models\Memento\Pizza;
use Illuminate\Http\Request;

class MementoController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "Хранитель(снимок)"
     */
    public function index(Request $request)
    {
        $pizza = new Pizza();
        $chief = new Chief($pizza);
        $chief->addIngredientToPizza('соус');
        $chief->addIngredientToPizza('оливки');
        $chief->addIngredientToPizza('салями');
        $chief->addIngredientToPizza('сыр');

        $result = [];

        foreach ($chief->pizzaStates as $pizzaState) {
            $result['После добавления ингредиентов'][] = $pizzaState;
        }

        $chief->undoAddIngredient();
        $chief->undoAddIngredient();
        $chief->undoAddIngredient();
        $chief->undoAddIngredient();

        foreach ($chief->pizzaStates as $pizzaState) {
            $result['После удаления ингредиентов'][] = $pizzaState;
        }

        $chief->addIngredientToPizza('соус');
        $chief->addIngredientToPizza('4 сыра');

        foreach ($chief->pizzaStates as $pizzaState) {
            $result['После второго добавления ингредиентов'][] = $pizzaState;
        }

        return $result;
    }
}
