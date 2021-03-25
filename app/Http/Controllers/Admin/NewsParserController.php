<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Category;
use App\Models\News;
use App\Models\Resource;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsParserController extends Controller
{

    public function getNews(){
        $resources = Resource::select('link')->get();


        foreach($resources as $item){
            NewsParsing::dispatch($item->link);
        }

        return redirect()->route('category.news.newsAll');
    }
}
