<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Categories extends Model
{

    public static function getCategories() {
        return json_decode(File::get(storage_path() . '/categories.json'),true);
    }

    public static function getCategoryById($id) {
        if(array_key_exists($id,static::getCategories())){
            return static::getCategories()[$id];
        }
        return [];
    }

    public static function getCategoryIdBySlug($slug){
        foreach(static::getCategories() as $item){

            if($item['slug'] == $slug){
                return $item['id'];
            }
        }


        return [];
    }
}
