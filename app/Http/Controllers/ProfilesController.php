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
        //policy for edit link
        $this->authorize('update',$user->profile);

        return view('profiles.edit',compact('user'));
    }
    public function update(User $user)
    {
        //policy for save action 
        $this->authorize('update',$user->profile);
        $data = request()->validate([
            'description' => 'required',
            'link' => 'url',
            'image' => ''
        ]);
        //use user in auth
        auth()->user()->profile->update($data);
        return redirect("/profile/{$user->id}"); 
    }
}
