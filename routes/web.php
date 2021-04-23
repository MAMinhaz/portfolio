<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LandviewController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactinfoController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CustomFrontendController;

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

    Route::get('admin-dashboard', [HomeController::class, 'admin_dashboard'])->middleware('auth')->name('home');


    //landview controller routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/portfolio/hero-block', [LandviewController::class, 'index'])->name('landview');

        Route::get('/portfolio/hero-block/create', [LandviewController::class, 'create'])->name('landview_create');

        Route::post('/portfolio/hero-block/create/post', [LandviewController::class, 'create_post'])->name('landview_create_post');

        Route::get('/portfolio/hero-block/delete/{id}', [LandviewController::class, 'hard_delete'])->name('landview_hard_delete');
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


        // blog post routes
        Route::get('/portfolio/blog/blog-post/create', [BlogController::class, 'blog_post_create'])->name('blog_post_create');

        Route::post('/portfolio/blog/blog-post/create/post', [BlogController::class, 'blog_post_create_post'])->name('blog_post_create_post');

        Route::get('/portfolio/blog/blog-post/edit/{id}', [BlogController::class, 'blog_post_edit'])->name('blog_post_edit');

        Route::post('/portfolio/blog/blog-post/edit/post', [BlogController::class, 'blog_post_edit_post'])->name('blog_post_edit_post');

        Route::get('/portfolio/blog/blog-post/delete/{id}', [BlogController::class, 'blog_post_hard_delete'])->name('blog_post_hard_delete');

        Route::get('/portfolio/blog/blog-post/preview/{id}', [BlogController::class, 'blog_post_preview'])->name('blog_post_preview');
    });


    //FrontendCustomizing controller routes
    Route::middleware(['auth'])->group(function (){
        // frontend image and text customizing routes
        Route::get('/portfolio-customizing/frontend/all', [CustomFrontendController::class, 'front_customize_index'])->name('front_customize_index');

        Route::post('/portfolio-customizing/frontend/customize/', [CustomFrontendController::class, 'front_customize_create_post'])->name('front_customize_create_post');

        Route::post('/portfolio-customizing/frontend/customize/post', [CustomFrontendController::class, 'front_customize_edit_post'])->name('front_customize_edit_post');

        Route::get('/portfolio-customizing/frontend/remove-customization/{id}', [CustomFrontendController::class, 'front_customize_hard_delete'])->name('front_customize_hard_delete');

        Route::get('/portfolio-customizing/frontend/download-old-cv/{id}', [CustomFrontendController::class, 'download_old_cv'])->name('download_old_cv');


        // frontend contact information customizing routes
        Route::get('/portfolio-customizing/contact-information/all', [ContactinfoController::class, 'f_contactinfo_index'])->name('f_contactinfo_index');

        Route::post('/portfolio-customizing/contact-information/add-new-contact-info/', [ContactinfoController::class, 'f_contactinfo_create_post'])->name('f_contactinfo_create_post');

        Route::get('/portfolio-customizing/contact-information/edit-contact-info/{id}', [ContactinfoController::class, 'f_contactinfo_edit'])->name('f_contactinfo_edit');

        Route::post('/portfolio-customizing/contact-information/edit-contact-info/post', [ContactinfoController::class, 'f_contactinfo_edit_post'])->name('f_contactinfo_edit_post');

        Route::get('/portfolio-customizing/contact-information/remove-contact-info/{id}', [ContactinfoController::class, 'f_contactinfo_hard_delete'])->name('f_contactinfo_hard_delete');

        Route::get('/portfolio-customizing/contact-information/show-contact-info/{id}', [ContactinfoController::class, 'f_contactinfo_show'])->name('f_contactinfo_show');

        Route::get('/portfolio-customizing/contact-information/hide-contact-info/{id}', [ContactinfoController::class, 'f_contactinfo_hide'])->name('f_contactinfo_hide');


        // frontend social link customizing routes
        Route::post('/portfolio-customizing/social-links/add-new-social-links/', [ContactinfoController::class, 'f_links_create_post'])->name('f_links_create_post');

        Route::get('/portfolio-customizing/social-link/edit-social-link/{id}', [ContactinfoController::class, 'f_links_edit'])->name('f_links_edit');

        Route::post('/portfolio-customizing/social-link/edit-social-link/post', [ContactinfoController::class, 'f_links_edit_post'])->name('f_links_edit_post');

        Route::get('/portfolio-customizing/social-link/remove-social-link/{id}', [ContactinfoController::class, 'f_links_hard_delete'])->name('f_links_hard_delete');

        Route::get('/portfolio-customizing/social-link/show-social-link/{id}', [ContactinfoController::class, 'f_link_show'])->name('f_link_show');

        Route::get('/portfolio-customizing/social-link/hide-social-link/{id}', [ContactinfoController::class, 'f_link_hide'])->name('f_link_hide');
    });