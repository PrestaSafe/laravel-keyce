<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('blog.category-detail', compact('category'));
    }
}
