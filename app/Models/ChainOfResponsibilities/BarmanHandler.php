<?php

declare(strict_types=1);

namespace App\Models\ChainOfResponsibilities;

use App\Abstracts\ChainOfResponsibilities\EnumOrder;
use App\Abstracts\ChainOfResponsibilities\Handler;

class BarmanHandler extends Handler
{
    public string $info;

    public function checkRequest(EnumOrder $orderType): bool
    {
        $check = $orderType == EnumOrder::Binge;
        $this->info = $check ? 'Бармен наливает напиток' : 'Бармен не может выполнить заказ';

        return $check;
    }
}
