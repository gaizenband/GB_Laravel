<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function addNews(Request $request)
    {
        $categories = Categories::getCategories();

        if($request->isMethod('POST')){
            $request->flash();

            $newsArr = $request->except('_token');
            $success = News::createNews($newsArr);
            if($success){
                //Вероятно есть более красивый способ получить slug
                return redirect()->route('category.news.show', [$categories[$success['category_id']]['slug'], $success['id']]);
            }
            return redirect()->route('admin.add');
        }

        return view('admin.addNews')->with('categories',$categories);
    }

    public function getJson(){
        return response()->json(News::getNews())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
