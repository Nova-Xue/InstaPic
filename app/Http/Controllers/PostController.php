<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Post;
class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        //dd($users);
        $posts = Post::whereIn('user_id',$users)->latest()->get();
        //dd($posts);
        return view('posts.index',compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $data = request()->validate([
            'caption' =>'required',
            'image' => ['required','image']
        ]);
        
        $imagePath= request('image')->store('uploads','public');
        //image resize
        $image =Image::make(public_path("storage/{$imagePath}"))->fit(200,200);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        return redirect('/profile/'.auth()->user()->id);
    }
    public function show(\App\Post $post)
    {
        //dd($post);
        return view('posts.show',compact('post'));
    }
}
