<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/', [App\Http\Controllers\PortfolioController::class, 'portfolio'])->name('portfolio');

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    //landview controller routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/portfolio/landview', [App\Http\Controllers\LandviewController::class, 'index'])->name('landview');
        Route::get('/portfolio/landview/create', [App\Http\Controllers\LandviewController::class, 'create'])->name('landview_create');
        Route::post('/portfolio/landview/create/post', [App\Http\Controllers\LandviewController::class, 'create_post'])->name('landview_create_post');
        Route::get('/portfolio/landview/edit/{id}', [App\Http\Controllers\LandviewController::class, 'edit'])->name('landview_edit');
        Route::post('/portfolio/landview/edit/post', [App\Http\Controllers\LandviewController::class, 'edit_post'])->name('landview_edit_post');
        Route::get('/portfolio/landview/delete/{id}', [App\Http\Controllers\LandviewController::class, 'hard_delete'])->name('landview_hard_delete');
    });


    //Service controller routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/portfolio/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');
        Route::get('/portfolio/services/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('service_create');
        Route::post('/portfolio/service/create/post', [App\Http\Controllers\ServiceController::class, 'create_post'])->name('service_create_post');
        Route::get('/portfolio/service/edit/{id}', [App\Http\Controllers\ServiceController::class, 'edit'])->name('service_edit');
        Route::post('/portfolio/service/edit/post', [App\Http\Controllers\ServiceController::class, 'edit_post'])->name('service_edit_post');
        Route::get('/portfolio/service/delete/{id}', [App\Http\Controllers\ServiceController::class, 'hard_delete'])->name('service_hard_delete');
    });


    //Aboutme controller routes
    Route::middleware(['auth'])->group(function () {
        //Aboutme section home route
        Route::get('/portfolio/aboutme', [App\Http\Controllers\AboutMeController::class, 'index'])->name('aboutme');

        //Aboutme description routes
        Route::post('/portfolio/aboutme/description/create/post', [App\Http\Controllers\AboutMeController::class, 'aboutme_des_create_post'])->name('aboutme_des_create_post');
        Route::get('/portfolio/aboutme/description/edit/{id}', [App\Http\Controllers\AboutMeController::class, 'aboutme_des_edit'])->name('aboutme_des_edit');
        Route::post('/portfolio/aboutme/description/edit/post', [App\Http\Controllers\AboutMeController::class, 'aboutme_des_edit_post'])->name('aboutme_des_edit_post');
        Route::get('/portfolio/aboutme/description/delete/{id}', [App\Http\Controllers\AboutMeController::class, 'aboutme_des_hard_delete'])->name('aboutme_des_hard_delete');

        //Aboutme skills routes
        Route::post('/portfolio/aboutme/skills/create/post', [App\Http\Controllers\AboutMeController::class, 'aboutme_skills_create_post'])->name('aboutme_skills_create_post');
        Route::get('/portfolio/aboutme/skills/edit/{id}', [App\Http\Controllers\AboutMeController::class, 'aboutme_skill_edit'])->name('aboutme_skill_edit');
        Route::post('/portfolio/aboutme/skills/edit/post', [App\Http\Controllers\AboutMeController::class, 'aboutme_skill_edit_post'])->name('aboutme_skill_edit_post');
        Route::get('/portfolio/aboutme/skills/delete/{id}', [App\Http\Controllers\AboutMeController::class, 'aboutme_skill_hard_delete'])->name('aboutme_skill_hard_delete');

        //Aboutme milestones routes
        Route::post('/portfolio/aboutme/milestones/create/post', [App\Http\Controllers\AboutMeController::class, 'aboutme_ms_create_post'])->name('aboutme_ms_create_post');
        Route::get('/portfolio/aboutme/milestones/edit/{id}', [App\Http\Controllers\AboutMeController::class, 'aboutme_ms_edit'])->name('aboutme_ms_edit');
        Route::post('/portfolio/aboutme/milestones/edit/post', [App\Http\Controllers\AboutMeController::class, 'aboutme_ms_edit_post'])->name('aboutme_ms_edit_post');
        Route::get('/portfolio/aboutme/milestones/delete/{id}', [App\Http\Controllers\AboutMeController::class, 'aboutme_ms_hard_delete'])->name('aboutme_ms_hard_delete');
    });


    //portfolio controller routes
    Route::middleware(['auth'])->group(function () {
        // Portfolio content Routes
        Route::get('/portfolio/portfolio', [App\Http\Controllers\PortfolioController::class, 'portfolio_index'])->name('portfolio_index');
        Route::post('/portfolio/portfolio-details/create/post', [App\Http\Controllers\PortfolioController::class, 'portfolio_create_post'])->name('portfolio_create_post');
        Route::get('/portfolio/portfolio-details/edit/{id}', [App\Http\Controllers\PortfolioController::class, 'portfolio_edit'])->name('portfolio_edit');
        Route::post('/portfolio/portfolio-details/edit/post', [App\Http\Controllers\PortfolioController::class, 'portfolio_edit_post'])->name('portfolio_edit_post');
        Route::get('/portfolio/portfolio-details/delete/{id}', [App\Http\Controllers\PortfolioController::class, 'portfolio_hard_delete'])->name('portfolio_hard_delete');

        // Portfolio Category Routes
        Route::post('/portfolio/portfolio_category/post', [App\Http\Controllers\PortfolioController::class, 'portfolio_cat_create_post'])->name('portfolio_cat_create_post');
        Route::get('/portfolio/portfolio_category/edit/{id}', [App\Http\Controllers\PortfolioController::class, 'portfolio_cat_edit'])->name('portfolio_cat_edit');
        Route::post('/portfolio/portfolio_category/edit/post', [App\Http\Controllers\PortfolioController::class, 'portfolio_cat_edit_post'])->name('portfolio_cat_edit_post');
        Route::get('/portfolio/portfolio_category/delete/{id}', [App\Http\Controllers\PortfolioController::class, 'portfolio_cat_hard_delete'])->name('portfolio_cat_hard_delete');
    });

    //Testimonial controller routes
    Route::middleware(['auth'])->group(function (){
        // Testimonial content Routes
        Route::get('/portfolio/testimonial', [App\Http\Controllers\TestimonialController::class, 'testimonial_index'])->name('testimonial_index');
        Route::post('/portfolio/testimonial/create/post', [App\Http\Controllers\TestimonialController::class, 'testimonial_create_post'])->name('testimonial_create_post');
        Route::get('/portfolio/testimonial/show/{id}', [App\Http\Controllers\TestimonialController::class, 'testimonial_show'])->name('testimonial_show');
        Route::get('/portfolio/testimonial/hide/{id}', [App\Http\Controllers\TestimonialController::class, 'testimonial_hide'])->name('testimonial_hide');
        Route::get('/portfolio/testimonial/edit/{id}', [App\Http\Controllers\TestimonialController::class, 'testimonial_edit'])->name('testimonial_edit');
        Route::post('/portfolio/testimonial/edit/post', [App\Http\Controllers\TestimonialController::class, 'testimonial_edit_post'])->name('testimonial_edit_post');
        Route::get('/portfolio/testimonial/delete/{id}', [App\Http\Controllers\TestimonialController::class, 'testimonial_hard_delete'])->name('testimonial_hard_delete');

        // Testimonial content Routes
        Route::post('/portfolio/testimonial/companies/create/post', [App\Http\Controllers\TestimonialController::class, 'testimonial_companies_create_post'])->name('testimonial_companies_create_post');
        Route::get('/portfolio/testimonial/companies/show/{id}', [App\Http\Controllers\TestimonialController::class, 'testimonial_companies_show'])->name('testimonial_companies_show');
        Route::get('/portfolio/testimonial/companies/hide/{id}', [App\Http\Controllers\TestimonialController::class, 'testimonial_companies_hide'])->name('testimonial_companies_hide');
        Route::get('/portfolio/testimonial/companies/edit/{id}', [App\Http\Controllers\TestimonialController::class, 'testimonial_companies_edit'])->name('testimonial_companies_edit');
        Route::post('/portfolio/testimonial/companies/edit/post', [App\Http\Controllers\TestimonialController::class, 'testimonial_companies_edit_post'])->name('testimonial_companies_edit_post');
        Route::get('/portfolio/testimonial/companies/delete/{id}', [App\Http\Controllers\TestimonialController::class, 'testimonial_companies_hard_delete'])->name('testimonial_companies_hard_delete');
    });