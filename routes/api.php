<?php

use App\Http\Controllers\Despesas\DespesasController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//public
Route::get('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/store', [UsuarioController::class, 'store']);


Route::group(['middleware' => 'auth-jwt'], function () {
    Route::resource('users', UsuarioController::class, [
        'only' => ['show', 'update', 'destroy']
    ]);
    Route::resource('expenses', DespesasController::class);
});
