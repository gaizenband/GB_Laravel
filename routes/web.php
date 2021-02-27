<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Categories\CategoriesController;
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

Route::view('/','welcome')->name('Home');

Route::name('news.')
    ->prefix('news')
    ->group(function() {
        Route::get('/category', [CategoriesController::class, 'index'])->name('categories');
        Route::get('/category/{id_category}', [NewsController::class, 'showNews'])->name('news');
        Route::get('/category/{id_category}/news/{id}', [NewsController::class, 'show'])->name('newsOne');
    });


Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/test', [IndexController::class, 'test'])->name('test1');
    });

Route::view('/about', 'about')->name('About');
