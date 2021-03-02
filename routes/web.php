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

Auth::routes();

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('category.')
    ->prefix('category')
    ->group(function() {
        Route::get('/', [CategoriesController::class, 'index'])->name('categories');
        Route::name('news.')
            ->prefix('news')
            ->group(function() {
                Route::get('/{slug}', [NewsController::class, 'showNews'])->name('news');
                Route::get('/{slug}/{id}', [NewsController::class, 'show'])->name('show');
            });
    })
;


Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::match(['get','post'],'/addNews', [IndexController::class, 'addNews'])->name('add');
        Route::get('/getJson', [IndexController::class, 'getJson'])->name('json');
    });

Route::view('/about', 'about')->name('about');
