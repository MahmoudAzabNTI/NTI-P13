<?php

use App\Http\Controllers\API\Auth\EmailVerifcationControllerAPI;
use App\Http\Controllers\API\Auth\RegisterControllerAPI;
use App\Http\Controllers\Dashboards\DashboardController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Products\ProductControllerAPI;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function(){
    echo "hello";
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard'], function(){
    Route::group(['prefix' => 'products', 'as' => '.products.'], function(){
    Route::get('/', [ProductControllerAPI::class, 'index']);
    Route::get('create', [ProductControllerAPI::class, 'create']);
    Route::get('edit/{id}', [ProductControllerAPI::class, 'edit']);
    Route::post('store', [ProductControllerAPI::class, 'store']);
    Route::put('update/{id}', [ProductControllerAPI::class, 'update']);
    Route::delete('delete/{id}', [ProductControllerAPI::class, 'delete']);
    });
});

Route::group(['prefix' => 'auth', 'as' => 'auth'], function(){
    Route::post('register', RegisterControllerAPI::class);
    Route::get('send-code', [EmailVerifcationControllerAPI::class, 'sendCode']);
});

