<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/',[PostsController::class,'index'])->name('home');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');




//  nommer une route pour ne pas perdre l'url dans l'appli
Route::get('/a-propos', function(){
    return view('about');
})->name('about');


Route::get('/blog',[PostsController::class,'index'])->name('blog');

Route::get('/article/{id}',[PostsController::class,'show'])->name('article');

Route::get('/search/',[PostsController::class,'search'])->name('blogsearch');

Route::get('/blog/category/{slug}',
[CategoriesController::class,'show'])->name('category');

// Admin routes. 

Route::get('/admin',[DashboardController::class,'index'])->middleware('auth')->name('admin');


Route::get('/admin/contact',[DashboardController::class,'contact'])->middleware('auth')->name('admin_contact');

Route::resource('admin/posts', AdminPostController::class);

Route::get('/login',[DashboardController::class,'login'])->name('login');
Route::post('/auth',[DashboardController::class,'auth'])->name('auth');


Route::get('/cars', function()
{
    return view('cars');
});

require __DIR__.'/custom.php';