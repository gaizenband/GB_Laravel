<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


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

            $url = null;

            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
            }

            $newsArr = $request->except('_token');
            $newsArr['image'] = $url;

            $success = News::createNews($newsArr);
            if($success){
                //Вероятно есть более красивый способ получить slug
                return redirect()->route('category.news.show', [Categories::getCategorySlugById($success['category_id']), $success['id']]);
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
