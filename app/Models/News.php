<?php


namespace App\Models;


use Illuminate\Support\Facades\File;

class News
{

    public static function getNews() {
        return json_decode(File::get(storage_path() . '/news.json'),true);
    }

    public static function getNewsId($id) {
        $newsArr = static::getNews()[$id];

        if($newsArr){
            return $newsArr;
        }

        return [];
    }

    public static function getNewsByCategory($slug) {
        $id = Categories::getCategoryIdBySlug($slug);


        $newsArr = [];
        foreach (static::getNews() as $item) {
            if ($item['category_id'] == $id){
                array_push($newsArr,$item);
            }
        }
        return $newsArr;
    }

    public static function getCurrentCategoryBySlug($slug){
        $id = Categories::getCategoryIdBySlug($slug);

        return Categories::getCategoryById($id);
    }

    public static function createNews($news){
        $current = static::getNews();
        $newId = count($current) + 1;//Получение нового id
        $news['id']=$newId;//Присвоение нового id массиву
        $news['category_id']=intval($news['category_id']);//Преобразование категории в числовой тип
        $current[$newId] = $news; //Добавление в массив
        if(File::put(storage_path() . '/news.json', json_encode($current, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT))){
            return $news;
        }
         return false;
    }
}
