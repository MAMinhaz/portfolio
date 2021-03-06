<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutMeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=1; $i<=1 ; $i++) { 
            DB::table('about_me_des')->insert([
                'about_me_des' => $faker->sentence,
                'created_at' => now(),
            ]);
        }

        for ($i=1; $i<=6 ; $i++) { 
            DB::table('about_me_skills')->insert([
                'skill_name' => $faker->name,
                'skill_percent' => $faker->numberBetween(60,100),
                'created_at' => now(),
            ]);
        }

        for ($i=1; $i<=4 ; $i++) { 
            DB::table('about_me_milestones')->insert([
                'milestone_name' => $faker->name,
                'milestone_digit' => $faker->numberBetween(60,100),
                'created_at' => now(),
            ]);
        }
    }
}
