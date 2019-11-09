<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    //return homepage of a user
    public function index(User $user){
        //dd($userId);
        //dd(User::find($userId));
        // $user = User::findOrFail($userId);
        // return view('profiles.index',[
        //     'user' => $user
        // ]);
        return view('profiles.index',compact('user'));
    }
    public function edit(User $user)
    {
        return view('profiles.edit',compact('user'));
    }
    public function update(User $user)
    {
        $data = request()->validate([
            'description' => 'required',
            'link' => 'url',
            'image' => ''
        ]);
        $user->profile->update($data);
        return redirect("/profile/{$user->id}"); 
    }
}
