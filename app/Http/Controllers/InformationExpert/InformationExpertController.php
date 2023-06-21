<?php

declare(strict_types=1);

namespace App\Http\Controllers\InformationExpert;

use App\Models\InformationExpert\ShoppingCart;
use App\Models\InformationExpert\Pizza;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationExpertController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "GRASP - Информационный эксперт"
     */
    public function index(Request $request)
    {
        $pizzaSalami = new Pizza('Salami', 10.5);
        $pizzaMilano = new Pizza('Milano', 8.75);
        $pizzaCheese = new Pizza('Cheese', 9.10);

        $cart = new ShoppingCart([$pizzaSalami, $pizzaMilano, $pizzaCheese]);

        return $cart->getTotalPrice();
    }
}
