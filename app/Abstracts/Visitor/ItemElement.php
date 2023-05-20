<?php

declare(strict_types=1);

namespace App\Abstracts\Visitor;

abstract class ItemElement
{
    abstract public function accept($visitor): float;
}
