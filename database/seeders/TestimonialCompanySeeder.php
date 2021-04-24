<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('companies')->insert([
            'company_name' => $faker->company,
            'show_status' => $faker->numberBetween(1, 2),
            'created_at' => now(),
        ]);
    }
}
