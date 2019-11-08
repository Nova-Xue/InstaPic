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
        @foreach($user->posts as $post)
            <div class="col-md-4">
                <img src="/storage/{{$post->image}}" alt="posts" class="p-2 mw-100">
            </div>
        @endforeach

    </div>
</div>
@endsection