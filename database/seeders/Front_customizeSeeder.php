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
        CustomFrontend::insert([
            "job_title" => "this is job title",
            "mockup_image" => "mockup_image.jpg",
            "hire_me_image" => "hire_me_image.jpg",
            "testimonial_image" => "testimonial_image.jpg",
            "get_in_touch_image" => "get_in_touch_image.jpg",
        ]);
    }
}
