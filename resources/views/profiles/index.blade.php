@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{$user->profile->profileImage()}}" alt="icon" class="rounded-circle" style="max-width:200px">
        </div>
        <div class="col-md-8 pt-4">

            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex">
                    <span class="pt-2">{{ $user->username}}</span>
                    <follow-button user-id="{{$user->id}}" follow="{{$follow}}"></follow-button>
                </div>
                <!-- policy check -->
                @can('update',$user->profile)
                <a href="/p/create">New Post</a>
                @endcan
            </div>
            <!-- policy check to render the edit link -->
            @can('update',$user->profile)
            <div class="pb-2"><a href="/profile/{{$user->id}}/edit">Edit</a></div>
            @endcan
            <div class="d-flex">
                <div class="pr-3">{{$postsCount}} Posts</div>
                <div class="pr-3">{{$followersCount}} Followers</div>
                <div class="pr-3">{{$followingCount}} Followings</div>
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