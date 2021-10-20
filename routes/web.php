<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
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
[CategoriesController::class,'index'])->name('category');