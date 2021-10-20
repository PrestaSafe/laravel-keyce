<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.index', compact('posts'));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        if (Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]))
        {

            return redirect()->route('admin')->with('success','Vous êtes identifié');
        }
        return redirect()->route('login')->with('danger','Impossible de vous identifier');
    }
}
