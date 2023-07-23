<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Welcom
Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');

//Category
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('categories.show');

//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function(){
    Route::get('/', AdminController::class)->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

//News
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}/{categories_id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->where('categories_id', '\d+')
    ->name('news.show');

//Test
Route::get('/test', function(\Illuminate\Http\Request $request) {
    return response()->download('robots.txt');
});

