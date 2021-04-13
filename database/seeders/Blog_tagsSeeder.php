<?php

namespace Database\Seeders;

use App\Models\Blog_tags;
use Illuminate\Database\Seeder;

class Blog_tagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog_tags::insert([
            'tag' => 'fakeer',
            'addedby' => 1,
            'created_at' => now(),
        ]);
    }
}
