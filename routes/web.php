<?php

use App\Http\Controllers\MethodChaining\MethodChainingController;
use App\Http\Controllers\ObjectPool\ObjectPoolController;
use App\Http\Controllers\Prototype\PrototypeController;
use App\Http\Controllers\LazyInit\LazyInitController;
use App\Http\Controllers\Builder\BuilderController;
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
