@extends('layouts.app')

@section('content')
<div class="container d-flex">
    <div class="row">
        <div class="col-md-8">
            <img src="/storage/{{$post->image}}" alt="post" class="w-100">
        </div>
        <div class="col-md-4">
            <div class="d-flex pb-4">
                <div>
                    <img src="{{$post->user->profile->profileImage()}}" alt="icon" class="rounded-circle mr-4" style="max-width:50px">
                </div>
                <div class="d-flex pt-3">
                    <a href="/profile/{{$post->user->id}}">{{$post->user->username}}</a>
                    <a href="" class="pl-4">Follow</a>
                </div>
            </div>
            <div>{{$post->caption}}</div>
        </div>
    </div>
</div>
@endsection