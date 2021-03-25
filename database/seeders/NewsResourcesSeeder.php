<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $links = ['Lenta'=>'https://lenta.ru/rss/','Rambler'=>'https://news.rambler.ru/rss/world/'];


    public function run()
    {
        DB::table('resources')->insert($this->makeLinks());

    }

    private function makeLinks(){
        $data = [];

        foreach($this->links as $key => $value){
            $data[] = [
                'title' => $key,
                'link' => $value,
            ];
        }

        return $data;
    }
}
