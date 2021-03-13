<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{

    public function show($slug = null, $id = null){
        $news = News::query()->where('id',$id)->first();
        return view('news.one')->with('news',$news);
    }

    public function showNews($slug){

        $category = Category::query()->where('slug',$slug)->first();
        return view('news.news')->with('news',$category->news()->paginate(3))->with('category',$category);

    }

    public function getNews(News $news){
        return view('news.news')->with('news',$news->paginate(3))->with('categories',Category::all());
    }

}
