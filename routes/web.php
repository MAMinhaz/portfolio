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
    Route::get('/', [App\Http\Controllers\PortfolioController::class, 'portoview'])->name('portoview');

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
