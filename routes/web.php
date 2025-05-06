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
use App\Http\Controllers\Site\Page\IndexController as PageController;
use App\Http\Controllers\Site\Faq\IndexController as FaqController;
use App\Http\Controllers\Site\Kvkk\IndexController as KvkkController;

use App\Http\Controllers\SitemapController;
use App\Http\Controllers\RobotsController;
use App\Http\Middleware\CheckMaintenanceMode;


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



Route::middleware([
    CheckMaintenanceMode::class,
])->group(function () {

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('site.sitemap');
Route::get('/robots.txt', [RobotsController::class, 'index'])->name('site.robots');



Route::get('/', [IndexController::class, 'index'])->name('site.index');
Route::get('/hakkimizda', [AboutController::class, 'index'])->name('site.about');
Route::get('/projelerimiz', [ProjectsController::class, 'index'])->name('site.projects');
Route::get('/hizmetlerimiz', [ServicesController::class, 'index'])->name('site.services');
Route::get('/haberler', [BlogsController::class, 'index'])->name('site.blog');
route::get('/bize-ulasin', [ContactController::class, 'index'])->name('site.contact');
Route::post('/bize-ulasin', [ContactController::class, 'store'])->name('contact.store');
Route::get('/ara', [SearchController::class, 'index'])->name('site.search');
Route::get('/sikca-sorulan-sorular', [FaqController::class, 'index'])->name('site.faq');
Route::get('/kvkk', [KvkkController::class, 'index'])->name('site.kvkk');








Route::get('/page/{slug}', [PageController::class, 'detail'])->name('page-detail');



Route::get('/haber-datayi/{id}', [BlogController::class, 'index'])->name('blog-detail');
Route::get('/proje-datayi/{id}', [ProjectController::class, 'index'])->name('project-detail');
Route::get('/hizmet-detayi/{id}', [ServiceController::class, 'index'])->name('service-detail');




});




