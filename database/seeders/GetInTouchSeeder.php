<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GetInTouchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('contactinfos')->insert([
            'email' => $faker->safeEmail,
            'cell_number' => $faker->numberBetween(1,99999999999),
            'address' => $faker->address,
            'show_status' => $faker->numberBetween(1,2),
            'created_at' => now(),
        ]);
    }
}
