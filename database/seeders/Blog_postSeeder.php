<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class Blog_postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::insert([
            'title' => 'this is title',
            'category_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia, magnam iure voluptatibus quia sunt excepturi inventore unde illo perspiciatis voluptatem in id accusantium atque enim, dolore at amet sint similique.',
        ]);
    }
}
