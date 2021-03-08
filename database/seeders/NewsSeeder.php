<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData(){
        $temp = json_decode(File::get(storage_path() . '/news.json'),true);
        $data = [];
        foreach($temp as $item){
            $data[] =[
                'id' => $item['id'],
                'title' => $item['title'],
                'text' => $item['text'],
                'isPrivate' => false,
                'image' => $item['image']
            ];
        }
        return $data;
    }
}
