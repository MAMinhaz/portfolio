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
