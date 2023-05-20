<?php

declare(strict_types=1);

namespace App\Abstracts\Visitor;

abstract class OrderItemVisitor
{
    abstract public function visit($item): float;
}
