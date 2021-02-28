<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    private static $categories = [
        '1'=>[
            'id' => 1,
            'title' => 'Спорт',
            'slug' => 'sport'
        ],
        '2'=>[
            'id' => 2,
            'title' => 'Политика',
            'slug' => 'politica'
        ]
    ];

    public static function getCategories() {
        return static::$categories;
    }

    public static function getCategoryById($id) {
        if(array_key_exists($id,static::$categories)){
            return static::$categories[$id];
        }
        return [];
    }

    public static function getCategoryIdBySlug($slug){
        foreach(static::$categories as $item){

            if($item['slug'] == $slug){
                return $item['id'];
            }
        }


        return [];
    }
}
