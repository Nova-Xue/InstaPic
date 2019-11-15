<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{
    //      
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function store(Post $post)
    {
        $data = request()->validate([
            'comment' => 'required',
        ]);
        $userId = auth()->user()->id;
        $username = auth()->user()->username;
        $post->comment()->create([
            'user_id' => $userId,
            'username' => $username,
            'comment' => $data['comment'],
        ]);
        return redirect("/p/".$post->id);
    }
}
