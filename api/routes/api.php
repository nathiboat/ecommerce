<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Products\ProductControler;

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



Route::resource('categories', CategoryController::class);
Route::resource('products', ProductControler::class);




Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [App\Http\Controllers\Api\Auth\RegisterController::class, 'register']);
    Route::post('/login', [App\Http\Controllers\Api\Auth\LoginController::class, 'login']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

