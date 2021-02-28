<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function addNews()
    {
        $categoies = Categories::getCategories();
        return view('admin.addNews')->with('categories',$categoies);
    }
}
