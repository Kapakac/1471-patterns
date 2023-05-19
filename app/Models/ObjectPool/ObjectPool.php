<?php

declare(strict_types=1);

namespace App\Models\ObjectPool;

use SplFixedArray;

class ObjectPool
{
    private array $busy;
    private array $free;

    public function __construct()
    {
        $this->busy = [];
        $this->free = [];
    }

    public function getObject(): Platter
    {
        if (count($this->free) === 0) {
            $id = count($this->free) + count($this->busy) + 1;
            $object = new Platter($id);
            $object->info = 'There are no free objects in pool, we need to create one.';
        } else {
            $object = array_pop($this->free);
            $object->info = 'There are free objects in pool, we will pick one of them.';
        }
        $this->busy[$object->getPlatterId()] = $object;

        return $object;
    }

    public function releaseObject(Platter $platter): array
    {
        $id = $platter->getPlatterId();
        if (isset($this->busy[$id])) {
            unset($this->busy[$id]);
            $this->free[$id] = $platter;
        }

        return ["$id has been released"];
    }

    public function getPoolStatus(): string
    {
        $numberOfFree = count($this->free);
        $numberOfBusy = count($this->busy);
        return "Pool has $numberOfFree available objects and $numberOfBusy busy objects";
    }
}
