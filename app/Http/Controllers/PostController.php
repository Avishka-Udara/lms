<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usertype=Auth::user()->usertype;
        $User = User::all();
        if($usertype=='1'){
            $posts = Post::latest()->paginate(5);
            return view('posts.index',compact('posts'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usertype=Auth::user()->usertype;
        $User = User::all();
        if($usertype=='1'){
            return view('posts.create');
        }
        else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usertype=Auth::user()->usertype;
        $User = User::all();
        if($usertype=='1'){
            $request->validate([

                'Title' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);


            $input = $request->all();

            if ($image = $request->file('image')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";

            }

            Post::create($input);
            return redirect()->route('posts.index')
                            ->with('success','post created successfully.');
        }
        else {
            abort(403);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $usertype=Auth::user()->usertype;
        $User = User::all();
        if($usertype=='1'){
            return view('posts.show',compact('post'));
        }
        else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $usertype=Auth::user()->usertype;
        $User = User::all();
        if($usertype=='1'){
            return view('posts.edit',compact('post'));
        }
        else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $usertype=Auth::user()->usertype;
        $User = User::all();
        if($usertype=='1'){
            $request->validate([
                'Title' => 'required',
                'description' => 'required'
            ]);

            $input = $request->all();

            if ($image = $request->file('image')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";

            }else{
                unset($input['image']);
            }
            $post->update($input);
            return redirect()->route('posts.index')
                            ->with('success','post updated successfully');
        }
        else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $usertype=Auth::user()->usertype;
        $User = User::all();
        if($usertype=='1'){
            $post->delete();
            return redirect()->route('posts.index')
                            ->with('success','Post deleted successfully');
        }
        else {
            abort(403);
        }
    }
}
