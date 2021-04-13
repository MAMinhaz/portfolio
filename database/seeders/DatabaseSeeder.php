<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Blog_categorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(Portfolio_categorySeeder::class);
        $this->call(Blog_categorySeeder::class);
    }
}
