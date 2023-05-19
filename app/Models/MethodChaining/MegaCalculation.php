<?php

declare(strict_types=1);

namespace App\Models\MethodChaining;

class MegaCalculation
{
    public function __construct(public float $x)
    {
    }

    public function add(float $a)
    {
        $this->x += $a;

        return $this;
    }

    public function mul(float $a)
    {
        $this->x *= $a;

        return $this;
    }

    public function pow(float $a)
    {
        $this->x = pow($this->x, $a);

        return $this;
    }

    public function sub(float $a)
    {
        $this->x -= $a;

        return $this;
    }

    public function div(float $a)
    {
        $this->x = $this->x / $a;

        return $this;
    }
}
