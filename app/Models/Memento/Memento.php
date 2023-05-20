<?php

declare(strict_types=1);

namespace App\Models\Memento;

class Memento
{
    public function __construct(public array $state)
    {
    }

    public function getState(): array
    {
        return $this->state;
    }
}
