<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoriesController; //Importamos el componente de categorias
use App\Http\Livewire\ProductsController;
use App\Http\Livewire\CoinsController;
use App\Http\Livewire\PosController;
use App\Http\Livewire\SettingsController;
use App\Http\Livewire\UsersController;
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

// Route::view('loginweb', 'login');
// Route::post('/loginweb', function () { //Vista del login
//     return request();
// });

Route::get('categories', CategoriesController::class); //Creamos el nombre de la ruta del componente y va a ejecutar la funcion render del controlador;
Route::get('products', ProductsController::class);
Route::get('coins', CoinsController::class);
Route::get('pos', PosController::class);
Route::get('settings', SettingsController::class);
Route::get('users', UsersController::class);
//sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdf cambios del gordo
