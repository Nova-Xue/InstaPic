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
            <!-- policy check to render the edit link -->
            @can('update',$user->profile)
            <div class="pb-2"><a href="/profile/{{$user->id}}/edit">Edit</a></div>
            @endcan
            <div class="d-flex">
                <div class="pr-3">{{$user->posts->count()}} Posts</div>
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
                <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" alt="posts" class="p-2 w-100"></a>
            </div>
        @endforeach

    </div>
</div>
@endsection