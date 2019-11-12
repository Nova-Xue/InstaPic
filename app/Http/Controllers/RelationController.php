<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RelationController extends Controller
{
    //
    public function follow(User $user)
    {
         return $user->username;
    }
}
