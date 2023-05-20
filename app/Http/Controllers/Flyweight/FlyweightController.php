<?php

declare(strict_types=1);

namespace App\Http\Controllers\Flyweight;

use App\Models\Flyweight\FlyWeightFactory;
use App\Models\Flyweight\PizzaOrderMaker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlyweightController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "Легковес"
     */
    public function index(Request $request)
    {
        $flyweightFactory = new FlyweightFactory();
        $pizzaMaker = new PizzaOrderMaker($flyweightFactory);
        $sharedStates = [
            [30, 'Большая пицца'],
            [25, 'Средняя пицца'],
            [10, 'Маленькая пицца']
        ];

        $uniqueStates = ['Маргарита', 'Салями', '4 сыра'];

        foreach ($uniqueStates as $unique) {
            foreach ($sharedStates as $state) {
                $pizzaMaker->makePizzaOrder($unique, $state[1]);
            }
        }

        $result['Количество созданный пицц:'] = count($pizzaMaker->contexts);
        $result['Количество разделяемых объектов:'] = $flyweightFactory->getTotal();

        foreach ($pizzaMaker->contexts as $key => $context) {
            $result['Пиццы:'][$key] = [
                'Номер пиццы в списке:' => $key,
                'Уникальное состояние:' => $context->uniqueState,
                'Разделяемое состояние:' => $context->flyweight->sharedState
            ];
        }

        return $result;
    }
}
