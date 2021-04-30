<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=1; $i<=13 ; $i++) { 
            DB::table('portfos')->insert([
                'title' => $faker->title,
                'description' => $faker->realText,
                'date' => $faker->dateTime,
                'clients' => $faker->userName,
                'category_id' => $faker->numberBetween($min = 1, $max = 10),
            ]);
        }
    }
}
