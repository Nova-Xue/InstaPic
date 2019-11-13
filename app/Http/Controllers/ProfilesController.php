<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cache;
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
        $follow = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        //dd($follow);
        //$postsCount = $user->posts->count();
        $postsCount = Cache::remember(
            'count.posts.'.$user->id,
            now()->addSecond(30),
            function() use ($user)  {
                return $user->posts->count();
            }
        );
        //$followersCount = $user->profile->followers->count();
        $followersCount = Cache::remember(
            'count.followers.'.$user->id,
            now()->addSecond(30),
            function() use ($user)  {
                return $user->profile->followers->count();
            }
        );

        //$followingCount = $user->following->count();
        $followingCount = Cache::remember(
            'count.following.'.$user->id,
            now()->addSecond(30),
            function() use ($user)  {
                return $user->following->count();
            }
        );
        return view('profiles.index',compact('user','follow','postsCount','followersCount','followingCount'));
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
