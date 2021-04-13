<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LandviewController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TestimonialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    //portofolio controller routes
    Route::get('/', [PortfolioController::class, 'portfolio'])->name('portfolio');

    Auth::routes();

    Route::get('admin-dashboard', [HomeController::class, 'index'])->middleware('auth')->name('home');

    //landview controller routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/portfolio/landview', [LandviewController::class, 'index'])->name('landview');
        Route::get('/portfolio/landview/create', [LandviewController::class, 'create'])->name('landview_create');
        Route::post('/portfolio/landview/create/post', [LandviewController::class, 'create_post'])->name('landview_create_post');
        Route::get('/portfolio/landview/edit/{id}', [LandviewController::class, 'edit'])->name('landview_edit');
        Route::post('/portfolio/landview/edit/post', [LandviewController::class, 'edit_post'])->name('landview_edit_post');
        Route::get('/portfolio/landview/delete/{id}', [LandviewController::class, 'hard_delete'])->name('landview_hard_delete');
    });


    //Service controller routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/portfolio/services', [ServiceController::class, 'index'])->name('service');
        Route::get('/portfolio/services/create', [ServiceController::class, 'create'])->name('service_create');
        Route::post('/portfolio/service/create/post', [ServiceController::class, 'create_post'])->name('service_create_post');
        Route::get('/portfolio/service/edit/{id}', [ServiceController::class, 'edit'])->name('service_edit');
        Route::post('/portfolio/service/edit/post', [ServiceController::class, 'edit_post'])->name('service_edit_post');
        Route::get('/portfolio/service/delete/{id}', [ServiceController::class, 'hard_delete'])->name('service_hard_delete');
    });


    //Aboutme controller routes
    Route::middleware(['auth'])->group(function () {
        //Aboutme section home route
        Route::get('/portfolio/aboutme', [AboutMeController::class, 'index'])->name('aboutme');

        //Aboutme description routes
        Route::post('/portfolio/aboutme/description/create/post', [AboutMeController::class, 'aboutme_des_create_post'])->name('aboutme_des_create_post');
        Route::get('/portfolio/aboutme/description/edit/{id}', [AboutMeController::class, 'aboutme_des_edit'])->name('aboutme_des_edit');
        Route::post('/portfolio/aboutme/description/edit/post', [AboutMeController::class, 'aboutme_des_edit_post'])->name('aboutme_des_edit_post');
        Route::get('/portfolio/aboutme/description/delete/{id}', [AboutMeController::class, 'aboutme_des_hard_delete'])->name('aboutme_des_hard_delete');

        //Aboutme skills routes
        Route::post('/portfolio/aboutme/skills/create/post', [AboutMeController::class, 'aboutme_skills_create_post'])->name('aboutme_skills_create_post');
        Route::get('/portfolio/aboutme/skills/edit/{id}', [AboutMeController::class, 'aboutme_skill_edit'])->name('aboutme_skill_edit');
        Route::post('/portfolio/aboutme/skills/edit/post', [AboutMeController::class, 'aboutme_skill_edit_post'])->name('aboutme_skill_edit_post');
        Route::get('/portfolio/aboutme/skills/delete/{id}', [AboutMeController::class, 'aboutme_skill_hard_delete'])->name('aboutme_skill_hard_delete');

        //Aboutme milestones routes
        Route::post('/portfolio/aboutme/milestones/create/post', [AboutMeController::class, 'aboutme_ms_create_post'])->name('aboutme_ms_create_post');
        Route::get('/portfolio/aboutme/milestones/edit/{id}', [AboutMeController::class, 'aboutme_ms_edit'])->name('aboutme_ms_edit');
        Route::post('/portfolio/aboutme/milestones/edit/post', [AboutMeController::class, 'aboutme_ms_edit_post'])->name('aboutme_ms_edit_post');
        Route::get('/portfolio/aboutme/milestones/delete/{id}', [AboutMeController::class, 'aboutme_ms_hard_delete'])->name('aboutme_ms_hard_delete');
    });


    //portfolio controller routes
    Route::middleware(['auth'])->group(function () {
        // Portfolio content Routes
        Route::get('/portfolio/portfolio', [PortfolioController::class, 'portfolio_index'])->name('portfolio_index');
        Route::post('/portfolio/portfolio-details/create/post', [PortfolioController::class, 'portfolio_create_post'])->name('portfolio_create_post');
        Route::get('/portfolio/portfolio-details/edit/{id}', [PortfolioController::class, 'portfolio_edit'])->name('portfolio_edit');
        Route::post('/portfolio/portfolio-details/edit/post', [PortfolioController::class, 'portfolio_edit_post'])->name('portfolio_edit_post');
        Route::get('/portfolio/portfolio-details/delete/{id}', [PortfolioController::class, 'portfolio_hard_delete'])->name('portfolio_hard_delete');

        // Portfolio Category Routes
        Route::post('/portfolio/portfolio_category/post', [PortfolioController::class, 'portfolio_cat_create_post'])->name('portfolio_cat_create_post');
        Route::get('/portfolio/portfolio_category/edit/{id}', [PortfolioController::class, 'portfolio_cat_edit'])->name('portfolio_cat_edit');
        Route::post('/portfolio/portfolio_category/edit/post', [PortfolioController::class, 'portfolio_cat_edit_post'])->name('portfolio_cat_edit_post');
        Route::get('/portfolio/portfolio_category/delete/{id}', [PortfolioController::class, 'portfolio_cat_hard_delete'])->name('portfolio_cat_hard_delete');
    });


    //Testimonial controller routes
    Route::middleware(['auth'])->group(function (){
        // Testimonial content Routes
        Route::get('/portfolio/testimonial', [TestimonialController::class, 'testimonial_index'])->name('testimonial_index');
        Route::post('/portfolio/testimonial/create/post', [TestimonialController::class, 'testimonial_create_post'])->name('testimonial_create_post');
        Route::get('/portfolio/testimonial/show/{id}', [TestimonialController::class, 'testimonial_show'])->name('testimonial_show');
        Route::get('/portfolio/testimonial/hide/{id}', [TestimonialController::class, 'testimonial_hide'])->name('testimonial_hide');
        Route::get('/portfolio/testimonial/edit/{id}', [TestimonialController::class, 'testimonial_edit'])->name('testimonial_edit');
        Route::post('/portfolio/testimonial/edit/post', [TestimonialController::class, 'testimonial_edit_post'])->name('testimonial_edit_post');
        Route::get('/portfolio/testimonial/delete/{id}', [TestimonialController::class, 'testimonial_hard_delete'])->name('testimonial_hard_delete');

        // Testimonial content Routes
        Route::post('/portfolio/testimonial/companies/create/post', [TestimonialController::class, 'testimonial_companies_create_post'])->name('testimonial_companies_create_post');
        Route::get('/portfolio/testimonial/companies/show/{id}', [TestimonialController::class, 'testimonial_companies_show'])->name('testimonial_companies_show');
        Route::get('/portfolio/testimonial/companies/hide/{id}', [TestimonialController::class, 'testimonial_companies_hide'])->name('testimonial_companies_hide');
        Route::get('/portfolio/testimonial/companies/edit/{id}', [TestimonialController::class, 'testimonial_companies_edit'])->name('testimonial_companies_edit');
        Route::post('/portfolio/testimonial/companies/edit/post', [TestimonialController::class, 'testimonial_companies_edit_post'])->name('testimonial_companies_edit_post');
        Route::get('/portfolio/testimonial/companies/delete/{id}', [TestimonialController::class, 'testimonial_companies_hard_delete'])->name('testimonial_companies_hard_delete');
    });


    //Contact controller routes
    Route::middleware(['auth'])->group(function (){
        Route::get('/portfolio/contacts/all', [ContactController::class, 'contact_index'])->name('contact_index');
        Route::post('/create/contact', [ContactController::class, 'contact_create_post'])->name('contact_create_post');
        Route::get('/portfolio/contacts/delete/{id}', [ContactController::class, 'contact_hard_delete'])->name('contact_hard_delete');
        Route::get('/portfolio/contacts/download/{id}', [ContactController::class, 'contact_download'])->name('contact_download');
    });


    //Blog controller routes
    Route::middleware(['auth'])->group(function (){
        // blog content index routes
        Route::get('/portfolio/blog/blog/all', [BlogController::class, 'blog_index'])->name('blog_index');

        // blog category routes
        Route::get('/portfolio/blog/blog-category/all', [BlogController::class, 'blog_cats_index'])->name('blog_cats_index');
        Route::post('/portfolio/blog/blog-category/create/post', [BlogController::class, 'blog_cats_create_post'])->name('blog_cats_create_post');
        Route::get('/portfolio/blog/blog-category/edit/{id}', [BlogController::class, 'blog_cat_edit'])->name('blog_cat_edit');
        Route::post('/portfolio/blog/blog-category/edit/post', [BlogController::class, 'blog_cat_edit_post'])->name('blog_cat_edit_post');
        Route::get('/portfolio/blog/blog-category/delete/{id}', [BlogController::class, 'blog_cats_hard_delete'])->name('blog_cats_hard_delete');

        // blog tags routes
        Route::get('/portfolio/blog/blog-tags/all', [BlogController::class, 'blog_tags_index'])->name('blog_tags_index');
        Route::post('/portfolio/blog/blog-tags/create/post', [BlogController::class, 'blog_tags_create_post'])->name('blog_tags_create_post');
        Route::get('/portfolio/blog/blog-tags/edit/{id}', [BlogController::class, 'blog_tag_edit'])->name('blog_tag_edit');
        Route::post('/portfolio/blog/blog-tags/edit/post', [BlogController::class, 'blog_tag_edit_post'])->name('blog_tag_edit_post');
        Route::get('/portfolio/blog/blog-tags/delete/{id}', [BlogController::class, 'blog_tag_hard_delete'])->name('blog_tag_hard_delete');
    });