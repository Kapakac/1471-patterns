<?php

declare(strict_types=1);

namespace App\Http\Controllers\Visitor;

use App\Models\Visitor\OnlyCoffeeDiscountVisitor;
use App\Models\Visitor\OnlyPizzaDiscountVisitor;
use App\Models\Visitor\WithoutDiscountVisitor;
use App\Models\Visitor\AllDiscountVisitor;
use App\Http\Controllers\Controller;
use App\Models\Visitor\Waiter;
use App\Models\Visitor\Coffee;
use App\Models\Visitor\Pizza;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "Посетитель"
     */
    public function index(Request $request)
    {
        $result = [];

        $orders = [
            new Pizza(name: 'Маргарита', price: 12.3),
            new Coffee(name: 'Латте', price: 5, capacity: 0.3),
            new Pizza(name: '4 сыра', price: 10.5),
            new Pizza(name: 'Салями', price: 15.2),
            new Coffee(name: 'Капучино', price: 4, capacity: 0.27)
        ];

        $discount = new WithoutDiscountVisitor();
        $waiter = new Waiter($discount);
        $waiter->setOrder($orders);
        $result['Сумма заказа без учета скидок:'] =$waiter->calcFinishPrice();

        $discount = new OnlyPizzaDiscountVisitor();
        $waiter->setDiscount($discount);
        $result['Сумма заказа c учетом скидки на пиццу:'] = $waiter->calcFinishPrice();

        $discount = new OnlyCoffeeDiscountVisitor();
        $waiter->setDiscount($discount);
        $result['Сумма заказа c учетом скидки на кофе:'] = $waiter->calcFinishPrice();

        $discount = new AllDiscountVisitor();
        $waiter->setDiscount($discount);
        $result['Сумма заказа c учетом скидки на всё:'] = $waiter->calcFinishPrice();

        return $result;
    }
}
