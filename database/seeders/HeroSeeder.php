<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $id = DB::table('landviews')->insertGetId([
            'name' => $faker->name,
            'created_at' => now(),
        ]);

        DB::table('landview_professions')->insert([
            'landview_id' => $id,
            'profession_name' => $faker->name,
            'created_at' => now(),
        ]);
    }
}
