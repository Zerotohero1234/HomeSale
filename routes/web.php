<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TestDesignController;

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


Auth::routes();

Route::get('/users', [UsersController::class, 'index'])->middleware('auth')->name('users');

Route::post('/addUser', [UsersController::class, 'insert'])->middleware('auth')->name('addUser');

Route::get('/editUser/{id}', [UsersController::class, 'edit'])->middleware('auth')->name('editUser');

Route::post('/updateUser', [UsersController::class, 'update'])->middleware('auth')->name('updateUser');

Route::get('/deleteUser/{id}', [UsersController::class, 'delete'])->middleware('auth')->name('deleteUser');

Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth')->name('users');

Route::get('/editCategory/{id}', [CategoryController::class, 'edit'])->middleware('auth')->name('editCategory');

Route::post('/updateCategory', [CategoryController::class, 'update'])->middleware('auth')->name('updateCategory');

Route::post('/addCategory', [CategoryController::class, 'insert'])->middleware('auth')->name('addCategory');

Route::get('/access_denied', [UsersController::class, 'access_denied'])->middleware('auth')->name('access_denied');

//test design
Route::get('/', [TestDesignController::class, 'index'])->name('index');

Route::get('/home', [TestDesignController::class, 'index'])->name('index');

Route::get('/detail/{id}', [TestDesignController::class, 'detail'])->name('detail');