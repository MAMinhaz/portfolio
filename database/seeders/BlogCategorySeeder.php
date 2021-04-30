<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=1; $i <=10 ; $i++) { 
            DB::table('blog_categories')->insert([
                'category_name' => $faker->unique($reset = false, $maxRetries = 10000)->word(),
                'created_at' => now(),
            ]);
        }
    }
}
