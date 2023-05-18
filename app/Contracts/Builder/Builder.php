<?php

declare(strict_types=1);

namespace App\Contracts\Builder;

use App\Abstracts\Builder\Pizza;

interface Builder
{
    public function prepareDough();

    public function addSauce();

    public function addTopping();

    public function getPizza(): Pizza;
}
