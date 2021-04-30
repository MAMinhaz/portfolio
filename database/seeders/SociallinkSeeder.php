<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SociallinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=1; $i<=5 ; $i++) { 
            DB::table('sociallinks')->insert([
                'link_name' => $faker->title,
                'link' => $faker->url,
                'created_at' => now(),
            ]);
        }
    }
}
