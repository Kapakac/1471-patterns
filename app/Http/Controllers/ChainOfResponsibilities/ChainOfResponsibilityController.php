<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChainOfResponsibilities;

use App\Models\ChainOfResponsibilities\KitchenHandler;
use App\Models\ChainOfResponsibilities\BarmanHandler;
use App\Models\ChainOfResponsibilities\WaiterHandler;
use App\Models\ChainOfResponsibilities\RequestOrder;
use App\Abstracts\ChainOfResponsibilities\EnumOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChainOfResponsibilityController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "Цепочка обязанностей"
     */
    public function index(Request $request)
    {
        $kitchen = new KitchenHandler();
        $bar = new BarmanHandler($kitchen);
        $waiter = new WaiterHandler();
        $waiter->setSuccessor($bar);

        $list = ['Борщ', 'Макароны'];
        $request = new RequestOrder($list, EnumOrder::NotVegan);
        $waiter->handle($request);

        dd($waiter);
    }
}
