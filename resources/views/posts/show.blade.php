@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="/storage/{{$post->image}}" alt="post" class="mw-100">
        </div>
        <div class="col-md-4">
            <div class="d-flex pb-4">
                <div>
                    <img src="{{$post->user->profile->profileImage()}}" alt="icon" class="rounded-circle mr-4" style="max-width:50px">
                </div>
                <div class="d-flex pt-3">
                    <a href="/profile/{{$post->user->id}}">{{$post->user->username}}</a>
                    <follow-button user-id="{{$post->user->id}}" follow="{{$follow}}"></follow-button>
                </div>
            </div>
            <div>{{$post->caption}}</div>
            <h3>Comments</h3>
            @foreach($comments as $comment)
            <div class="row py-2">
                <div class="col-md-4">
                    <a href="/profile/{$comment->user_id}">
                        {{$comment->username}}
                    </a>
                </div>
                <div class="col-md-8">
                    <p>
                        {{$comment->comment}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection