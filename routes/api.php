<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
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

Route::get('/login', [UserController::class, 'login'])
    ->name('user.store');

Route::post('/logout', [UserController::class, 'logout'])
->name('user.store');

Route::group(['middleware' => 'auth-jwt'], function(){
    Route::post('/store', [UserController::class, 'me'])
    ->name('user.store');
});
