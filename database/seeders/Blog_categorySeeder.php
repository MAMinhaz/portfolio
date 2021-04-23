<?php

namespace Database\Seeders;

use App\Models\Blog_category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class Blog_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog_category::insert([
            'category_name' => "new category",
            'created_at' => now(),
        ]);
    }
}
