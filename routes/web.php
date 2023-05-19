<?php

use App\Http\Controllers\Prototype\PrototypeController;
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
