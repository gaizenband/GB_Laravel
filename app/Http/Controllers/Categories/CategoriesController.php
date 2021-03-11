<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
//    public function index(){
//        $categories = Categories::getCategories();
//        return view('news.categories')->with('categories',$categories);
//    }
    public function index(){
        return view('news.categories')->with('categories', Category::all());
    }
}
