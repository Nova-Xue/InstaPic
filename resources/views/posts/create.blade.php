@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group row">
            <div class="col-md-8 offset-2">

                <label for="caption" class="col-md-4 col-form-label">{{ __('Caption') }}</label>

                <div class="col-md-6">
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 offset-2">

                <label for="image" class="col-md-4 col-form-label">{{ __('Image') }}</label>
                <input type="file" name="image" id="image" class="form-control-file ml-3">
                @error('image')
                <strong>{{ $message }}</strong>
                @enderror

            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8 offset-2">

                <input type="submit" value="Add New Post" class="ml-3">

            </div>
        </div>
    </form>
</div>
@endsection