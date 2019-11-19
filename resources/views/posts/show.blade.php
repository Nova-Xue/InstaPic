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
            <div class="comment-modal">
                

                <form action="/c/{{$post->id}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col">

                            <label for="comment" class="col col-form-label">{{ __('Comment') }}</label>

                            <div class="col">
                                <input type="hidden" name="postId" value="{{$post->id}}">
                                <input id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" autocomplete="comment" autofocus>

                                @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <button class="btn-secondary">Add Your Comment</button>
                </form>

            </div>


            <h3>Comments</h3>
            @foreach($comments as $comment)
            <div class="row py-2">
                <div class="col-md-4">
                    <a href="/profile/{{$comment->user_id}}">
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