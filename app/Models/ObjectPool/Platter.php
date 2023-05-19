<?php

declare(strict_types=1);

namespace App\Models\ObjectPool;

class Platter
{
    public string $info;

    public function __construct(public int $platterId)
    {
    }

    public function getPlatterId(): int
    {
        return $this->platterId;
    }
}
