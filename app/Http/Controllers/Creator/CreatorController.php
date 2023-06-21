<?php

declare(strict_types=1);

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\Creator\ShoppingCart;
use Illuminate\Http\Request;

class CreatorController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "GRASP - Создатель"
     */
    public function index(Request $request)
    {
        $cart = new ShoppingCart();
        $cart->addPizza('Salami', 10.5);
        $cart->addPizza('Milano', 8.75);
        $cart->addPizza('Cheese', 9.10);

        return $cart->getItems();
    }
}
