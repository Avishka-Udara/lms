<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Cource;
use Illuminate\Http\Request;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        $cources = Cource::latest()->paginate(5);
        return view('welcome',compact('posts','cources'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


    }
    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Post $post)
    {
        return view('welcome.news',compact('post'));
    }


    public function edit(Post $post)
    {
    }

    public function update(Request $request, Post $post)
    {

    }


    public function destroy(Post $post)
    {

    }

}
