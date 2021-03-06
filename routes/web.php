<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ClientesController::class,'index'])->name('home');
Route::get('/clientes',[ClientesController::class,'indexjs'])->name('clientes');
Route::get('/json',[ClientesController::class,'indexjson'])->name('clientes');
