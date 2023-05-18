<?php

declare(strict_types=1);

namespace App\Models\Builder;

use App\Contracts\Builder\Builder;
use App\Abstracts\Builder\Pizza;

class Director
{
    public function make(Builder $builder): Pizza
    {
        $builder->prepareDough();
        $builder->addSauce();
        $builder->addTopping();

        return $builder->getPizza();
    }
}
