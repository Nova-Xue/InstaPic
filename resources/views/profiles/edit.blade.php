@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        
        <div class="form-group row">
            <div class="col-md-8 offset-2">
            <h1>Edit Profile</h1>
                <label for="description" class="col-md-4 col-form-label">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 offset-2">

                <label for="link" class="col-md-4 col-form-label">{{ __('Link') }}</label>

                <div class="col-md-6">
                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') ?? $user->profile->link}}" autocomplete="link" autofocus>

                    @error('link')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 offset-2">

                <label for="image" class="col-md-4 col-form-label">{{ __('Profile Image') }}</label>
                <input type="file" name="image" id="image" class="form-control-file ml-3">
                @error('image')
                <strong>{{ $message }}</strong>
                @enderror

            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 offset-2">

                <input type="submit" value="Save Profile" class="ml-3">

            </div>
        </div>
    </form>
</div>
@endsection