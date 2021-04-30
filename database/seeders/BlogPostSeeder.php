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

        for ($i=1; $i<=20 ; $i++) { 
            DB::table('blogs')->insert([
                'title' => $faker->title,
                'category_id' => $faker->numberBetween(1, 10),
                'description' => $faker->realText,
                'created_at' => now(),
            ]);
        }
    }
}
