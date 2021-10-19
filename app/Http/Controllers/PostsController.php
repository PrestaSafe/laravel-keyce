<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        // compact('posts') == ['posts' => $posts];
        $posts = Post::where('active',1)
            ->orderBy('id','DESC')
            ->paginate(env('POST_PAGINATE',10));
        return view('blog',compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.detail', compact('post'));
    }

    public function search(Request $request)
    {
        $search = e($request->input('search'));
        $posts = Post::where('active',1)
            ->where('title','LIKE',"%$search%")
            ->orwhere('content','LIKE',"%$search%")
            ->orderBy('id','DESC')
            ->paginate(env('POST_PAGINATE',10));
        return view('blog',compact('posts','search'));
    }
    
}
