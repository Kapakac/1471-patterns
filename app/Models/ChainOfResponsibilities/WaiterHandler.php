<?php

declare(strict_types=1);

namespace App\Models\ChainOfResponsibilities;

use App\Abstracts\ChainOfResponsibilities\EnumOrder;
use App\Abstracts\ChainOfResponsibilities\Handler;

class WaiterHandler extends Handler
{
    public string $info;

    public function checkRequest(EnumOrder $orderType): bool
    {
        $check = in_array($orderType, [EnumOrder::Binge, EnumOrder::Vegan, EnumOrder::NotVegan]);
        $this->info = $check ? 'Официант передает заказ дальше' : 'Официант отклоняет запрос клиента';

        return $check;
    }
}
