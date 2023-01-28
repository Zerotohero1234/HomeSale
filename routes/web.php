<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FutureWorksController;
use App\Http\Controllers\HomeSlideImagesController;
use App\Http\Controllers\PastWorksController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PresentWorksController;
use App\Http\Controllers\TopSellingSlideImagesController;
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

Route::post('/addFloorPlanSlideImage', [PlanController::class, 'addFloorPlanSlideImage'])->middleware('auth')->name('addFloorPlanSlideImage');

Route::get('/floorPlanSlideImages/{id}', [PlanController::class, 'floorPlanSlideImages'])->middleware('auth')->name('floorPlanSlideImages');

Route::get('/deleteFloorPlanSlideImage/{id}/plan/{plan_id}', [PlanController::class, 'deleteFloorPlanSlideImage'])->middleware('auth')->name('deleteFloorPlanSlideImage');

Route::get('/floors/{id}', [PlanController::class, 'floors'])->middleware('auth')->name('floors');

Route::post('/addFloor', [PlanController::class, 'addFloor'])->middleware('auth')->name('addFloor');

Route::get('/editFloor/{id}', [PlanController::class, 'editFloor'])->middleware('auth')->name('editFloor');

Route::post('/updateFloor', [PlanController::class, 'updateFloor'])->middleware('auth')->name('updateFloor');

Route::get('/rooms/{id}', [PlanController::class, 'rooms'])->middleware('auth')->name('floors');

Route::post('/addRoom', [PlanController::class, 'addRoom'])->middleware('auth')->name('addRoom');

Route::get('/editRoom/{id}', [PlanController::class, 'editRoom'])->middleware('auth')->name('editRoom');

Route::post('/updateRoom', [PlanController::class, 'updateRoom'])->middleware('auth')->name('updateRoom');

Route::get('/access_denied', [UsersController::class, 'access_denied'])->middleware('auth')->name('access_denied');

Route::post('/addHomeSlideImage', [HomeSlideImagesController::class, 'addHomeSlideImage'])->middleware('auth')->name('addHomeSlideImage');

Route::get('/homeSlideImages', [HomeSlideImagesController::class, 'homeSlideImages'])->middleware('auth')->name('homeSlideImages');

Route::get('/deleteHomeSlideImage/{id}', [HomeSlideImagesController::class, 'deleteHomeSlideImage'])->middleware('auth')->name('deleteHomeSlideImage');

Route::post('/addTopSellingSlideImage', [TopSellingSlideImagesController::class, 'addTopSellingSlideImage'])->middleware('auth')->name('addTopSellingSlideImage');

Route::get('/topSellingSlideImages', [TopSellingSlideImagesController::class, 'topSellingSlideImages'])->middleware('auth')->name('topSellingSlideImages');

Route::get('/deleteTopSellingSlideImage/{id}', [TopSellingSlideImagesController::class, 'deleteTopSellingSlideImage'])->middleware('auth')->name('deleteTopSellingSlideImage');

Route::get('/pastWorks', [PastWorksController::class, 'index'])->middleware('auth')->name('pastWorks');

Route::post('/addPastWork', [PastWorksController::class, 'insert'])->middleware('auth')->name('addPastWork');

Route::get('/editPastWork/{id}', [PastWorksController::class, 'edit'])->middleware('auth')->name('editPastWork');

Route::post('/updatePastWork', [PastWorksController::class, 'update'])->middleware('auth')->name('updatePastWork');

Route::get('/pastWorkImages/{id}', [PastWorksController::class, 'pastWorkImages'])->middleware('auth')->name('pastWorkImages');

Route::post('/addPastWorkImage', [PastWorksController::class, 'addPastWorkImage'])->middleware('auth')->name('addPastWorkImage');

Route::get('/deletePastWorkImage/{id}/pastwork_id/{pastwork_id}', [PastWorksController::class, 'deletePastWorkImage'])->middleware('auth')->name('deletePastWorkImage');

Route::get('/pastWorkThumbnail/{id}', [PastWorksController::class, 'thumbnail'])->middleware('auth')->name('pastWorkThumbnail');

Route::post('/updatePastWorkThumbnail', [PastWorksController::class, 'updateThumbnail'])->middleware('auth')->name('updatePastWorkThumbnail');


Route::get('/presentWorks', [PresentWorksController::class, 'index'])->middleware('auth')->name('presentWorks');

Route::post('/addPresentWork', [PresentWorksController::class, 'insert'])->middleware('auth')->name('addPresentWork');

Route::get('/editPresentWork/{id}', [PresentWorksController::class, 'edit'])->middleware('auth')->name('editPresentWork');

Route::post('/updatePresentWork', [PresentWorksController::class, 'update'])->middleware('auth')->name('updatePresentWork');

Route::get('/presentWorkImages/{id}', [PresentWorksController::class, 'presentWorkImages'])->middleware('auth')->name('presentWorkImages');

Route::post('/addPresentWorkImage', [PresentWorksController::class, 'addPresentWorkImage'])->middleware('auth')->name('addPresentWorkImage');

Route::get('/deletePresentWorkImage/{id}/presentwork_id/{presentwork_id}', [PresentWorksController::class, 'deletePresentWorkImage'])->middleware('auth')->name('deletePresentWorkImage');

Route::get('/presentWorkThumbnail/{id}', [PresentWorksController::class, 'thumbnail'])->middleware('auth')->name('presentWorkThumbnail');

Route::post('/updatePresentWorkThumbnail', [PresentWorksController::class, 'updateThumbnail'])->middleware('auth')->name('updatePresentWorkThumbnail');

Route::get('/futureWorks', [FutureWorksController::class, 'index'])->middleware('auth')->name('futureWorks');

Route::post('/addFutureWork', [FutureWorksController::class, 'insert'])->middleware('auth')->name('addFutureWork');

Route::get('/editFutureWork/{id}', [FutureWorksController::class, 'edit'])->middleware('auth')->name('editFutureWork');

Route::post('/updateFutureWork', [FutureWorksController::class, 'update'])->middleware('auth')->name('updateFutureWork');

Route::get('/futureWorkImages/{id}', [FutureWorksController::class, 'futureWorkImages'])->middleware('auth')->name('futureWorkImages');

Route::post('/addFutureWorkImage', [FutureWorksController::class, 'addFutureWorkImage'])->middleware('auth')->name('addFutureWorkImage');

Route::get('/deleteFutureWorkImage/{id}/futurework_id/{futurework_id}', [FutureWorksController::class, 'deleteFutureWorkImage'])->middleware('auth')->name('deleteFutureWorkImage');

Route::get('/futureWorkThumbnail/{id}', [FutureWorksController::class, 'thumbnail'])->middleware('auth')->name('futureWorkThumbnail');

Route::post('/updateFutureWorkThumbnail', [FutureWorksController::class, 'updateThumbnail'])->middleware('auth')->name('updateFutureWorkThumbnail');

//test design
Route::get('/', [TestDesignController::class, 'index'])->name('index');

Route::get('/home', [TestDesignController::class, 'index'])->name('index');

Route::get('/search', [TestDesignController::class, 'search'])->name('search');

Route::get('/plansByCategory/{id}', [TestDesignController::class, 'plansByCategory'])->name('plansByCategory');

Route::get('/detail/{id}', [TestDesignController::class, 'detail'])->name('detail');

Route::get('/showPastWorks', [TestDesignController::class, 'showPastWorks'])->name('showPastWorks');

Route::get('/pastWorkDetail/{id}', [TestDesignController::class, 'pastWorkDetail'])->name('pastWorkDetail');

Route::get('/showPresentWorks', [TestDesignController::class, 'showPresentWorks'])->name('showPresentWorks');

Route::get('/presentWorkDetail/{id}', [TestDesignController::class, 'presentWorkDetail'])->name('presentWorkDetail');

Route::get('/showFutureWorks', [TestDesignController::class, 'showFutureWorks'])->name('showFutureWorks');

Route::get('/futureWorkDetail/{id}', [TestDesignController::class, 'futureWorkDetail'])->name('futureWorkDetail');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);