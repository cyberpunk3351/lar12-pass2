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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('pass/create', [App\Http\Controllers\HomeController::class, 'create'])->name('pass.create');
Route::post('pass/', [App\Http\Controllers\HomeController::class, 'store'])->name('pass.store');
Route::get('pass/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('pass.edit');
Route::patch('/pass/edit/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('pass.update');
Route::delete('pass/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('pass.destroy');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('index');
});

Route::get('role/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('role.edit');
Route::patch('/role/edit/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('role.update');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
