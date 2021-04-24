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

        DB::table('portfos')->insert([
            'title' => $faker->title,
            'description' => $faker->realText,
            'date' => $faker->dateTime,
            'clients' => $faker->userName,
            'category_id' => 1,
        ]);
    }
}
