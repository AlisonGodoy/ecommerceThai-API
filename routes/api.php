<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/products', [ProductsController::class, 'index']);

Route::post('/products/create', [ProductsController::class, 'store']);

Route::patch('/products/update', [ProductsController::class, 'update']);

Route::delete('/products/{id}', [ProductsController::class, 'destroy']);