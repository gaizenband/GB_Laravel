<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(CategoriesSeeder::class);
//        $this->call(NewsSeeder::class);
//        \App\Models\News::factory(5)->create();
        \App\Models\User::factory(5)->create();
        $this->call(AdminSeeder::class);

    }
}
