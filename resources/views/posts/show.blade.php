@extends('layouts.app')

@section('content')
<div class="container d-flex">
    <div class="row">
        <div class="col-md-8">
            <img src="/storage/{{$post->image}}" alt="post" class="w-100">
        </div>
        <div class="col-md-4">
            <div>{{$post->user->username}}</div>
            <div>{{$post->caption}}</div>
        </div>
    </div>
</div>
@endsection