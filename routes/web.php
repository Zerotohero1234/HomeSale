<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlanController;
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

Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth')->name('categories');

Route::get('/editCategory/{id}', [CategoryController::class, 'edit'])->middleware('auth')->name('editCategory');

Route::post('/updateCategory', [CategoryController::class, 'update'])->middleware('auth')->name('updateCategory');

Route::post('/addCategory', [CategoryController::class, 'insert'])->middleware('auth')->name('addCategory');

Route::get('/plans', [PlanController::class, 'index'])->middleware('auth')->name('plans');

Route::get('/editPlan/{id}', [PlanController::class, 'edit'])->middleware('auth')->name('editPlan');

Route::post('/updatePlan', [PlanController::class, 'update'])->middleware('auth')->name('updatePlan');

Route::post('/addPlan', [PlanController::class, 'insert'])->middleware('auth')->name('addPlan');

Route::get('/planThumbnail/{id}', [PlanController::class, 'thumbnail'])->middleware('auth')->name('planThumbnail');

Route::post('/updatePlanThumbnail', [PlanController::class, 'updateThumbnail'])->middleware('auth')->name('updatePlanThumbnail');

Route::post('/addPlanSlideImage', [PlanController::class, 'addSlideImage'])->middleware('auth')->name('addPlanSlideImage');

Route::get('/planSlideImages/{id}', [PlanController::class, 'slideImages'])->middleware('auth')->name('planSlideImages');

Route::get('/deletePlanSlideImage/{id}/plan/{plan_id}', [PlanController::class, 'deleteSlideImage'])->middleware('auth')->name('deletePlanSlideImage');

Route::post('/updatePlanSlideImage', [PlanController::class, 'updateSlideImage'])->middleware('auth')->name('updatePlanSlideImage');

Route::get('/access_denied', [UsersController::class, 'access_denied'])->middleware('auth')->name('access_denied');

//test design
Route::get('/', [TestDesignController::class, 'index'])->name('index');

Route::get('/home', [TestDesignController::class, 'index'])->name('index');

Route::get('/detail/{id}', [TestDesignController::class, 'detail'])->name('detail');