<?php

namespace Database\Seeders;

use App\Models\PortfoCategory;
use Illuminate\Database\Seeder;

class Portfolio_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PortfoCategory::insert([
            'category_name' => "new category",
            'created_at' => now(),
        ]);
    }
}
