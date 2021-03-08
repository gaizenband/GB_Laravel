<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Categories extends Model
{

    public static function getCategories() {
        return DB::table('categories')->get()->toArray();

//        return json_decode(File::get(storage_path() . '/categories.json'),true);
    }

    public static function getCategoryById($id) {

        foreach(static::getCategories() as $item){
            if ($item->id == intval($id)){
                return $item;
            }
        }
//        if(array_key_exists($id,static::getCategories())){
//            return static::getCategories()[$id];
//        }
        return [];
    }

    public static function getCategoryIdBySlug($slug){
        foreach(static::getCategories() as $item){

            if($item->slug == $slug){
                return $item->id;
            }
        }


        return [];
    }

    public static function getCategorySlugById($id){
        foreach(static::getCategories() as $item){

            if($item->id == $id){
                return $item->slug;
            }
        }


        return [];
    }
}
