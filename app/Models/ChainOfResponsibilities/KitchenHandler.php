<?php

declare(strict_types=1);

namespace App\Models\ChainOfResponsibilities;

use App\Abstracts\ChainOfResponsibilities\EnumOrder;
use App\Abstracts\ChainOfResponsibilities\Handler;

class KitchenHandler extends Handler
{
    public string $info;

    public function checkRequest(EnumOrder $orderType): bool
    {
        $check = in_array($orderType, [EnumOrder::Vegan, EnumOrder::NotVegan]);
        $this->info = $check ? 'Шеф-повар начал готовить заказ на кухне' : 'Шеф-повар отказался';

        return $check;
    }
}
