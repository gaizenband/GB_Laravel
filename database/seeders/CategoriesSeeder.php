<?php

namespace Database\Seeders;

use App\Models\NewsOld;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use Illuminate\Support\Facades\File;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData(){
        $temp = json_decode(File::get(storage_path() . '/categories.json'),true);
        $data = [];
        foreach($temp as $item){
            $data[] =[
                'id' => $item['id'],
                'title' => $item['title'],
                'slug' => $item['slug']
            ];
        }
        return $data;
    }
}
