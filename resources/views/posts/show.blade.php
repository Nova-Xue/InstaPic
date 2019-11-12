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
                    <img src="/storage/{{$post->user->profile->image}}" alt="icon" class="rounded-circle mr-4" style="max-width:50px">
                </div>
                <div>
                    <h1><a href="/profile/{{$post->user->id}}">{{$post->user->username}}</a></h1>
                </div>
            </div>
            <div>{{$post->caption}}</div>
        </div>
    </div>
</div>
@endsection