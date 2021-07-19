<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/productos/alta',[App\Http\Controllers\ProductsController::class, 'showForm'])->name('altasform');
Route::post('/producto/save',[App\Http\Controllers\ProductsController::class, 'create'])->name('producto.save');
Route::post('/producto/delete/{id}',[App\Http\Controllers\ProductsController::class, 'destroy'])->name('producto.delete');
Route::get('/producto/edit/{id}',[App\Http\Controllers\ProductsController::class, 'edit'])->name('editar.producto');
Route::post('/producto/update/{id}',[App\Http\Controllers\ProductsController::class, 'update'])->name('producto.update');
