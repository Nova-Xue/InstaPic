<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    //return homepage of a user
    public function index($userId){
        //dd($userId);
        //dd(User::find($userId));
        $user = User::findOrFail($userId);
        return view('profiles.index',[
            'user' => $user
        ]);
    }
}
