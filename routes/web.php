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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('pass/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::get('pass/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::patch('/dashboard', [App\Http\Controllers\HomeController::class, 'update'])->name('update');

Route::post('pass/', [App\Http\Controllers\HomeController::class, 'store'])->name('store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
