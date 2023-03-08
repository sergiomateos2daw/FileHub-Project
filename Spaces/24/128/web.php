<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\HomeController;
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

Route::get('/', HomeController::class);

Route::get('clientes', [ClienteController::class, 'index']);
Route::get('clientes/create', [ClienteController::class, 'create']);
Route::get('clientes/update/{id}', [ClienteController::class, 'update', 'id']);
Route::get('clientes/delete/{id}', [ClienteController::class, 'delete', 'id']);
Route::get('clientes/show/{id}', [ClienteController::class, 'show', 'id']);

Route::get('cuentas',[CuentaController::class, 'index']);
Route::get('cuentas/create',[CuentaController::class, 'create']);
Route::get('cuentas/store/{id}',[CuentaController::class, 'store', 'id']);
Route::get('cuentas/show/{id}',[CuentaController::class, 'show', 'id']);
Route::get('cuentas/edit/{id}',[CuentaController::class, 'edit', 'id']);
Route::get('cuentas/update/{id}',[CuentaController::class, 'update', 'id']);
Route::get('cuentas/destroy/{id}',[CuentaController::class, 'destroy', 'id']);