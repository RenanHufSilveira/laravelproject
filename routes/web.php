<?php

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

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExampleController;

//----------------Exemplos----------------------------
Route::get('/', [ExampleController::class, 'index']);
Route::get('/example/forquery', [ExampleController::class, 'exampleQuery']);
Route::get('/example/image', [ExampleController::class, 'exampleOrder']);
Route::get('/example/friendlyurl/{id?}', [ExampleController::class, 'exampleFor']);

//----------------Produtos----------------------------
Route::get('/products/create', [ProductController::class, 'create']);
Route::get('/products/list', [ProductController::class, 'index']);
Route::get('/products/{id?}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::post('/products/delete/', [ProductController::class, 'destroy']);