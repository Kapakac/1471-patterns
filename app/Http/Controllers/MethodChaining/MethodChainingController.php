<?php

declare(strict_types=1);

namespace App\Http\Controllers\MethodChaining;

use App\Models\MethodChaining\MegaCalculation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MethodChainingController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "Цепочка вызовов"
     */
    public function index(Request $request)
    {
        $calc = new MegaCalculation(100);
        $calc->add(100)->mul(5)->div(10)->pow(2)->sub(5);

        dd($calc);
    }
}
