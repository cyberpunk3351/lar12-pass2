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

Route::get('/pass/create', [App\Http\Controllers\PassController::class, 'create'])->name('pass.create');
Route::post('/pass', [App\Http\Controllers\PassController::class, 'store'])->name('pass.store');
Route::get('/pass/edit/{id}', [App\Http\Controllers\PassController::class, 'edit'])->name('pass.edit')->middleware('editor');
Route::patch('/pass/edit/{id}', [App\Http\Controllers\PassController::class, 'update'])->name('pass.update');
Route::delete('pass/{id}', [App\Http\Controllers\PassController::class, 'destroy'])->name('pass.destroy');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('index');
});

Route::group(['middleware' => ['admin']], function () {
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('cat.create');
    Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('cat.edit');
    Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('cat.store');
    Route::patch('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('cat.update');

    Route::get('role/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
    Route::patch('/role/edit/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
    Route::get('/role', [App\Http\Controllers\RoleController::class, 'role'])->name('role');

    Route::get('/admin/connections', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('connections.index');
    Route::post('/admin/connections', [App\Http\Controllers\Admin\CategoriesRolesConnectionsController::class, 'update'])->name('connections.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
