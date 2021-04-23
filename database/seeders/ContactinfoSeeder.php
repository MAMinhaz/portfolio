<?php

namespace Database\Seeders;

use App\Models\Contactinfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactinfoSeeder extends Seeder
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
            'cell_number' => $faker->numberBetween(1, 99999999),
            'address' => $faker->address,
            'created_at' => now(),
        ]);
    }
}