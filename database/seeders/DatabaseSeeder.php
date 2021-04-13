<?php

namespace Database\Seeders;

use App\Models\Blog_tags;
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
        $this->call([
            Portfolio_categorySeeder::class,
            Blog_categorySeeder::class,
            Blog_tags::class,
        ]);
    }
}
