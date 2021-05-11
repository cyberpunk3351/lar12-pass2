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
    Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
    Route::get('/admin/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
    Route::get('/admin/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
    Route::patch('/admin/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');

    Route::get('/admin/permission', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('permission.index');
    Route::post('/admin/permission', [App\Http\Controllers\Admin\CategoriesRolesPermissionsController::class, 'update'])->name('permission.update');

    Route::get('/admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('/admin/user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::patch('/admin/user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
