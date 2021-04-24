<?php

namespace Database\Seeders;

use Database\Seeders\BlogPost;
use Illuminate\Database\Seeder;
use Database\Seeders\HeroSeeder;
use Database\Seeders\BlogCategory;
use Database\Seeders\AboutMeSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\GetInTouchSeeder;
use Database\Seeders\SociallinkSeeder;
use Database\Seeders\ContactinfoSeeder;
use Database\Seeders\TestimonialSeeder;
use Database\Seeders\Front_customizeSeeder;
use Database\Seeders\PortfolioDetailsSeeder;
use Database\Seeders\PortfolioCategorySeeder;
use Database\Seeders\TestimonialCompanySeeder;


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
            AboutMeSeeder::class,
            BlogCategorySeeder::class,
            BlogPostSeeder::class,
            ContactinfoSeeder::class,
            Front_customizeSeeder::class,
            GetInTouchSeeder::class,
            HeroSeeder::class,
            PortfolioCategorySeeder::class,
            PortfolioDetailsSeeder::class,
            ServiceSeeder::class,
            SociallinkSeeder::class,
            TestimonialSeeder::class,
            TestimonialCompanySeeder::class,
        ]);
    }
}
