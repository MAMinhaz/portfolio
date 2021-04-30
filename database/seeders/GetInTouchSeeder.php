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

        for ($i=1; $i<=13 ; $i++) { 
            DB::table('contacts')->insert([
                'contact_name' => $faker->name,
                'contact_email' => $faker->safeEmail,
                'contact_subject' => $faker->sentence,
                'contact_message' => $faker->realText,
            ]);
        }
    }
}
