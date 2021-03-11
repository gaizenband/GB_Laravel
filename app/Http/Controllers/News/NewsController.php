<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsOld;
use App\Models\News;

class NewsController extends Controller
{

    public function show($id_category = null,$id = null){
        $news =News::query()->where('id', $id);

        $news = NewsOld::getNewsId($id);
        return view('news.one')->with('news',$news);
    }

    public function showNews($slug){
        $category = new News();
        $category->category()

        $news = NewsOld::getNewsByCategory($slug);
        $category = NewsOld::getCurrentCategoryBySlug($slug);

        return view('news.news')->with('news',$news)->with('category',$category);

    }
}
