<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Dashboards\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
})->name('/welcome');
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('dashboard/products/index', [ProductController::class, 'index'])->name('dashboard.products.index');
// Route::get('dashboard/products/create', [ProductController::class, 'create'])->name('dashboard.products.create');
// Route::post('dashboard.products.store', [ProductController::class, 'store'])->name('dashboard.products.store');
// Route::get('dashboard/products/edit', [ProductController::class, 'edit'])->name('dashboard.products.edit');

Route::group(['prefix'=>'dashboard','as'=>'dashboard', 'middleware' => 'verified'],function(){
    Route::get('/',[DashboardController::class,'index']);
    Route::group(['prefix'=>'products', 'as'=>'.products.'],function(){
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create')->middleware('password.confirm');
        Route::get('edit/{id}',[ProductController::class,'edit'])->name('edit');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
    });
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
