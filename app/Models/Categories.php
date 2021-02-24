<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    private static $categories = [
        [
            'id' => 1,
            'title' => 'Категория 1',
        ],
        [
            'id' => 2,
            'title' => 'Категория 2',
        ]
    ];

    public static function getCategories() {
        return static::$categories;
    }

    public static function getCategoriesId($id) {
        $resultArray = array_search($id,array_column(static::$categories,'id'));

        if($resultArray){
            return $resultArray;
        }

        return [];
    }
}
