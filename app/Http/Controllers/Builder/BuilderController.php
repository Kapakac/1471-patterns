<?php

declare(strict_types=1);

namespace App\Http\Controllers\Builder;

use App\Models\Builder\MargaritaPizzaBuilder;
use App\Http\Controllers\Controller;
use App\Models\Builder\Director;
use Illuminate\Http\Request;

class BuilderController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "Строитель"
     */
    public function index(Request $request)
    {
        $margaritaPizza = new MargaritaPizzaBuilder();
        $newPizza = (new Director())->make($margaritaPizza);

        dd($newPizza);
    }
}
