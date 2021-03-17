<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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
                Route::get('/all', [NewsController::class, 'getNews'])->name('newsAll');
                Route::get('/{slug}', [NewsController::class, 'showNews'])->name('news');
                Route::get('/{slug}/{news}', [NewsController::class, 'show'])->name('show');
            });
    })
;


Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth','isAdmin'])
    ->group(function () {
        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/category', AdminCategoryController::class);
        Route::get('/getJson', [IndexController::class, 'getJson'])->name('json');
        Route::resource('/users', ProfileController::class);
        Route::post('/adminStatus', [ProfileController::class,'changeAdminStatus']);
    });

Route::name('user.')
    ->prefix('user')
    ->middleware('auth')
    ->group(function () {
        Route::get('/{id}', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/edit', [ProfileController::class, 'update'])->name('update');
    });



Route::view('/about', 'about')->name('about');

