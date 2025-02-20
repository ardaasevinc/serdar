<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\IndexController;
use App\Http\Controllers\Site\Blog\IndexController as BlogController;
use App\Http\Controllers\Site\Project\IndexController as ProjectController;
use App\Http\Controllers\Site\Service\IndexController as ServiceController;
use App\Http\Controllers\Site\About\IndexController as AboutController;
use App\Http\Controllers\Site\Projects\IndexController as ProjectsController;
use App\Http\Controllers\Site\Services\IndexController as ServicesController;
use App\Http\Controllers\Site\Blogs\IndexController as BlogsController;
use App\Http\Controllers\Site\Contact\IndexController as ContactController;
use App\Http\Controllers\Site\Search\IndexController as SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('site.index');
Route::get('/about', [AboutController::class, 'index'])->name('site.about');
Route::get('/projects', [ProjectsController::class, 'index'])->name('site.projects');
Route::get('/services', [ServicesController::class, 'index'])->name('site.services');
Route::get('/blogs', [BlogsController::class, 'index'])->name('site.blog');
route::get('/contact', [ContactController::class, 'index'])->name('site.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
route::get('/search', [SearchController::class, 'index'])->name('site.search');






Route::get('/blog-detail/{id}', [BlogController::class, 'index'])->name('blog-detail');
Route::get('/project-detail/{id}', [ProjectController::class, 'index'])->name('project-detail');
Route::get('/service-detail/{id}', [ServiceController::class, 'index'])->name('service-detail');







