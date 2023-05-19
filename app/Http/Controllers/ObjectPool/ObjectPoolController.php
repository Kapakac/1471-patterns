<?php

declare(strict_types=1);

namespace App\Http\Controllers\ObjectPool;

use App\Models\ObjectPool\ObjectPool;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObjectPoolController extends Controller
{
    /**
     * Просто хардкодный пример ТОЛЬКО для демо-отображения паттерна "Объектный пул"
     */
    public function index(Request $request)
    {
        $pool = new ObjectPool();
        $result[] = $object1 = $pool->getObject();
        $result[] = $pool->getPoolStatus();
        $result[] = $object2 = $pool->getObject();
        $result[] = $pool->getPoolStatus();
        $result[] = $object3 = $pool->getObject();
        $result[] = $pool->getPoolStatus();
        $result[] = $pool->releaseObject($object2);
        $result[] = $pool->releaseObject($object3);
        $result[] = $object4 = $pool->getObject();

        return $result;
    }
}
