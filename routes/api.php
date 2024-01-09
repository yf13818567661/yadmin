<?php

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
Route::post('user/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('menus/route/tree', [\App\Http\Controllers\MenuController::class,'tree']);
    Route::apiResource('menus', \App\Http\Controllers\MenuController::class);
    Route::apiResource('user', \App\Http\Controllers\UserController::class);
});
