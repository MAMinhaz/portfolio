<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=1; $i<=10 ; $i++) { 
            DB::table('portfo_categories')->insert([
                'category_name' => $faker->word,
                'created_at' => now(),
            ]);
        }
    }
}
