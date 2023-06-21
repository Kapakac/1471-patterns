<?php

declare(strict_types=1);

namespace App\Models\Polymorphism;

use App\Contracts\Polymorphism\Generator;

class DocumentGenerator
{
    public function handle(Generator $document): void
    {
        $document->generate();
    }
}
