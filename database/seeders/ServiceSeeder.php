<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i<=7 ; $i++) { 
            DB::table('service_titles')->insert([
                'service_title' => $faker->title,
                'service_list_1' => $faker-> text,
                'service_list_2' => $faker-> text,
                'service_list_3' => $faker-> text,
                'service_list_4' => $faker-> text,
                'service_list_5' => $faker-> text,
                'service_list_6' => $faker-> text,
                'created_at' => now()
            ]);
        }
    }
}
