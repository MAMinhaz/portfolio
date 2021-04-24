<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('testimonials')->insert([
            'testimonial_given' => $faker->name,
            'designation' => $faker->jobTitle,
            'testimonial' => $faker->sentence,
            'show_status' => $faker->numberBetween(1, 2),
            'created_at' => now(),
        ]);
    }
}
