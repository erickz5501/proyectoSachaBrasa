<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoriesController; //Importamos el componente de categorias
use App\Http\Livewire\ProductsController;
<<<<<<< HEAD
use App\Http\Livewire\CoinsController;

=======
use App\Http\Livewire\PosController;
>>>>>>> dce47beb19e269ef4779ba53ab21ec6143260ce1
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('categories', CategoriesController::class); //Creamos el nombre de la ruta del componente y va a ejecutar la funcion render del controlador;
Route::get('products', ProductsController::class);
<<<<<<< HEAD
Route::get('coins', CoinsController::class);
=======

Route::get('pos', PosController::class);
>>>>>>> dce47beb19e269ef4779ba53ab21ec6143260ce1
