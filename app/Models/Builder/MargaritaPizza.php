<?php

declare(strict_types=1);

namespace App\Models\Builder;

use App\Abstracts\Builder\Pizza;

class MargaritaPizza extends Pizza
{
    public function __construct()
    {
        $this->name = 'Margarita';
        $this->cookingTime = 10;
    }
}
