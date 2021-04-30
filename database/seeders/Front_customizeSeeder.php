<?php

namespace Database\Seeders;

use App\Models\CustomFrontend;
use Illuminate\Database\Seeder;

class Front_customizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        CustomFrontend::insert([
            'job_title' => $faker->title,
            'site_name' => $faker->name,
            'cv' => 'cv_upload/anonymous.jpg',
            'portfolio_theme' => $faker->numberBetween(1,2),
            'created_at' => now(),
        ]);
    }
}
