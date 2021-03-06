@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row pt-4">
        <div class="col-md-8 offset-2">
            <img src="/storage/{{$post->image}}" alt="post" class="mw-100">
        </div>
    </div>
    <div class="row pt-2 pb-4 border-bottom">
        <div class="col-md-8 offset-2">
            <a href="/profile/{{$post->user->id}}">{{$post->user->username}}</a>
            <span>{{$post->caption}}</span>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection