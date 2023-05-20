<?php

declare(strict_types=1);

namespace App\Http\Controllers\Mediator;

use App\Models\Mediator\WorkersMediator;
use App\Abstracts\Mediator\OrderType;
use App\Http\Controllers\Controller;
use App\Models\Mediator\Barman;
use App\Models\Mediator\Waiter;
use App\Models\Mediator\Chief;
use App\Models\Mediator\Order;
use Illuminate\Http\Request;

class MediatorController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "Посредник"
     */
    public function index(Request $request)
    {
        $mediator = new WorkersMediator();
        $waiter1 = new Waiter(name: 'Александр', mediator: $mediator);
        $waiter2 = new Waiter(name: 'Георгий', mediator: $mediator);
        $waiter3 = new Waiter(name: 'Максим', mediator: $mediator);
        $barman1 = new Barman(name: 'Герман', mediator: $mediator);
        $barman2 = new Barman(name: 'Алексей', mediator: $mediator);
        $chief = new Chief(name: 'Станислав', mediator: $mediator);
        $chief1 = new Chief(name: 'Олег', mediator: $mediator);

        $typeOrders = [OrderType::Food, OrderType::Binge];
        for ($i = 0; $i < 10; $i++) {
            $orders[] = new Order($typeOrders[rand(0, count($typeOrders) - 1)]);
        }

        $waiters = [$waiter1, $waiter2, $waiter3];

        foreach ($orders as $order) {
            $waiter = array_rand($waiters, 1);
            $waiters[$waiter]->takeOrder($order);
        }

        dd($mediator);
    }
}
