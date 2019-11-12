<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

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
        //store and get profile image if existing in request
        if(request('image'))
        {
            $imagePath = request('image')->store('profile','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray = ['image'=> $imagePath];
        }
        //use user in auth and replace image with imagePath
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],//set imageArray or change nothing to image
        ));
        return redirect("/profile/{$user->id}"); 
    }
}
