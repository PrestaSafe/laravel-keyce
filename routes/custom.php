<?php

use App\Http\Controllers\ContactController;

use Illuminate\Support\Facades\Route;
Route::post('/contact/submit',[ContactController::class,'store'])->name('post_contact');

