<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsParserController extends Controller
{
    private $links = ['https://lenta.ru/rss/','https://news.rambler.ru/rss/world/'];

    public function getNews(CategoryController $categoryController){
        foreach($this->links as $link){
            $this->newsParse($link, $categoryController);
        }

        return redirect()->route('category.news.newsAll');
    }

    private function newsParse($link, $categoryController){
        $xml = XMLParser::load($link);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]']

        ]);

        foreach ($data['news'] as $news) {

            $category = Category::firstOrCreate([
                'title' => $news['category'],
                'slug' => $categoryController->makeSlug($news['category'])
            ]);

            News::create([
                'title' => $news['title'],
                'text' => trim($news['description']),
                'image' => $news['enclosure::url'],
                'category_id' => $category->id
            ]);
        }
    }
}
