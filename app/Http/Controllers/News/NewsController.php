<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{

    public function show($id_category = null,$id = null){
        $news = News::getNewsId($id);
        return view('news.one')->with('news',$news);
    }

    public function showNews($slug){
        $result = News::getNewsByCategory($slug);
        return view('news.news')->with('news',$result);

    }
}
