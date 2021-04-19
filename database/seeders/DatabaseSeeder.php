<?php

namespace Database\Seeders;

use App\Models\Sociallink;
use App\Models\Contactinfo;
use Illuminate\Database\Seeder;
use Database\Seeders\Blog_postSeeder;
use Database\Seeders\Blog_categorySeeder;
use Database\Seeders\Front_customizeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Portfolio_categorySeeder::class,
            Blog_categorySeeder::class,
            Front_customizeSeeder::class,
            Contactinfo::class,
            Sociallink::class,
        ]);
    }
}
