<?php

declare(strict_types=1);

namespace App\Abstracts\ChainOfResponsibilities;

use App\Models\ChainOfResponsibilities\RequestOrder;

abstract class Handler
{
    public function __construct(public $successor = null)
    {
    }

    public function handle(RequestOrder $request): void
    {
        $this->checkRequest($request->getOrderType());

        $this->successor?->handle($request);
    }

    public function setSuccessor($successor = null): void
    {
        $this->successor = $successor;
    }

    public function getSuccessor()
    {
        return $this->successor;
    }

    public abstract function checkRequest(EnumOrder $orderType): bool;
}
