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

Route::get('/', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('a');

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/list_entradas',[App\Http\Controllers\BlogController::class,'index'])->name('list_entradas');
Route::get('/create',[App\Http\Controllers\BlogController::class,'create'])->name('create');
Route::post('/store',[App\Http\Controllers\BlogController::class,'store'])->name('store');
Route::get('/eliminar/{entrada}',[App\Http\Controllers\BlogController::class,'destroy'])->name('eliminar');
Route::get('/editar/{entrada}',[App\Http\Controllers\BlogController::class,'edit'])->name('editar');

require __DIR__.'/auth.php';