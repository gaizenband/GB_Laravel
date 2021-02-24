<?php


namespace App\Models;


class News
{
    private static $news = [
        [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'category_id' => 1
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости(((',
            'category_id' => 1
        ]
    ];

    public static function getNews() {
        return static::$news;
    }

    public static function getNewsId($id) {
        $key = array_search($id,array_column(static::$news,'id'));
        $newsArr = static::$news[$key];

        if($newsArr){
            return $newsArr;
        }

        return [];
    }

    public static function getNewsByCategory($id) {
        $newsArr = [];
        foreach (static::$news as $item) {
            if ($item['category_id'] == $id){
                array_push($newsArr,$item);
            }
        }

        if($newsArr){
            return $newsArr;
        }

        return [];
    }

}
