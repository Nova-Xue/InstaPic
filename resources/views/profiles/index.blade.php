@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="/images/Canva - null.png" alt="coke" class="rounded-circle" style="max-width:200px">
        </div>
        <div class="col-md-8 pt-4">

            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username}}</h1>
                <a href="/p/create">New Post</a>
            </div>

            <div class="d-flex">
                <div class="pr-3">444 Posts</div>
                <div class="pr-3">444 Followers</div>
                <div class="pr-3">444 Followings</div>
            </div>
            <div>
                <p>{{$user->profile->description}}</p>
            </div>
            <div>
                <a href="#">{{$user->profile->link}}</a>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-4"><img src="/images/Canva - Black Video Game Controller.jpg" alt="black controller" class="p-2 mw-100"></div>
        <div class="col-md-4"><img src="/images/Canva - Man Playing Game on Personal Computer.jpg" alt="pc" class="p-2 mw-100"></div>
        <div class="col-md-4"><img src="/images/Canva - Person Playing Candy Crush on Nokia Smartphone.jpg" alt="smartphone" class="p-2 mw-100"></div>

    </div>
</div>
@endsection