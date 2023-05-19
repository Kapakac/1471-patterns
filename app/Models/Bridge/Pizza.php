<?php

declare(strict_types=1);

namespace App\Models\Bridge;

class Pizza
{
    private bool $isCook;

    public function __construct(
        public string $name,
        public int    $cookTime,
        public float  $temperature
    )
    {
        $this->isCook = false;
    }

    public function cook(): void
    {
        $this->isCook = true;
    }

    public function isCooked(): bool
    {
        return $this->isCook;
    }
}
