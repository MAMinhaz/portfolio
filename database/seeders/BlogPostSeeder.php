<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('blogs')->insert([
            'title' => $faker->title,
            'category_id' => 1,
            'description' => $faker->realText,
            'created_at' => now(),
        ]);
    }
}
