<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use stdClass;

class NewsOld
{

    public static function getNews() {
        return DB::table('news')->get()->toArray();
    }
    public static function getNewsFile() {
        return json_decode(File::get(storage_path() . '/news.json'),true);
    }

    public static function getNewsId($id) {
        $newsArr = null;


        foreach(static::getNews() as $item){

            if ($item->id == intval($id)){
                return $item;
            }
        }
        return [];
    }

    public static function getNewsByCategory($slug) {
        $id = Categories::getCategoryIdBySlug($slug);


        $newsArr = [];

        foreach (static::getNews() as $item) {
            if (static::findCategory($item) == $id){
                array_push($newsArr,$item);
            }
        }


        return $newsArr;
    }

    public static function findCategory($item){
        $file = json_decode(File::get(storage_path() . '/news.json'),true);
        foreach($file as $arr){
            if ($item->title == $arr['title']){
                return $arr['category_id'];
    }
}
}

    public static function getCurrentCategoryBySlug($slug){
        $id = Categories::getCategoryIdBySlug($slug);

        return Categories::getCategoryById($id);
    }

    public static function createNews($news){
        $current = static::getNewsFile();
        $newId = array_key_last($current) + 1;//Получение нового id
        $news['id']=$newId;//Присвоение нового id массиву
        $news['category_id']=intval($news['category_id']);//Преобразование категории в числовой тип
        $newsObj = new stdClass();
        foreach($news as $key => $value){
            $newsObj->$key = $value;
        }
        $current[$newId] = $newsObj; //Добавление в массив

        //Блок для добавления в БД
        $forDB = [];
        $forDB['title'] = $news['title'];
        $forDB['text'] = $news['text'];
        $forDB['isPrivate'] = isset($news['isPrivate']);
        $forDB['image'] = $news['image'];
        $forDB['id'] = $news['id'];

        if(
            File::put(storage_path() . '/news.json', json_encode($current, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT))
            &&
            DB::table('news')->insert($forDB)){
            return $news;
        }
         return false;
    }
}
