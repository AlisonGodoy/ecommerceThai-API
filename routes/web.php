<?php

use App\Http\Controllers\JogosController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', function () { 
//     return view('welcome');
// });

//Route::view('/jogos','jogos');

// Route::get('/jogos', function () {
//     return "Testando rota com MSG";
// });

//Route::view('/jogos','jogos',['name'=>'GTA']); //para acessar name, basta na view fazer a interpolação da variável {{ $name }}

// Route::get('/jogos/{name?}', function($name = null) {
//     return view('jogos',['nomeJogo'=>$name]);
// })->where('name','[A-Za-z]+');

Route::get('/jogos', [ProductsController::class,'index']);

Route::get('/home', function () {
    return view('welcome');
})->name('home-index');

Route::fallback(function(){
    return 'Erro na rota';
});