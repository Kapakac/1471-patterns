<?php

use App\Http\Controllers\MethodChaining\MethodChainingController;
use App\Http\Controllers\ObjectPool\ObjectPoolController;
use App\Http\Controllers\Prototype\PrototypeController;
use App\Http\Controllers\Flyweight\FlyweightController;
use App\Http\Controllers\LazyInit\LazyInitController;
use App\Http\Controllers\Mediator\MediatorController;
use App\Http\Controllers\Memento\MementoController;
use App\Http\Controllers\Builder\BuilderController;
use App\Http\Controllers\Bridge\BridgeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/builders', [BuilderController::class, 'index']);
Route::get('/prototypes', [PrototypeController::class, 'index']);
Route::get('/lazy-inits', [LazyInitController::class, 'index']);
Route::get('/method-chaining', [MethodChainingController::class, 'index']);
Route::get('/object-pool', [ObjectPoolController::class, 'index']);
Route::get('/bridges', [BridgeController::class, 'index']);
Route::get('/fly-weights', [FlyweightController::class, 'index']);
Route::get('/mediators', [MediatorController::class, 'index']);
Route::get('/mementos', [MementoController::class, 'index']);
