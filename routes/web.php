<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/',[ProductController::class, 'index'])->name('index');

Route::get('products',[ProductController::class, 'product'])->name('product');

Route::get('{name}/{id}', [ProductController::class, 'detail'])->name('details');

Route::get('category/{category}/{id}', [ProductController::class, 'category'])->name('category');

Route::get('dump/{name}/{id}', [ProductController::class, 'dumpBasket'])->name('basket');