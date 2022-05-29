@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-8 offset-2">
        <div class="card-body">
            <form method="POST" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row">
                    <label for="caption" class="col-form-label text-md-start">Title</label>

                    <div>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <label for="caption" class="col-form-label text-md-start">Description</label>

                    <div>
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <label for="caption" class="col-form-label text-md-start">URL</label>

                    <div>
                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>

                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <label for="image" class="col-form-label text-md-start">Profile Image</label>

                    <div>
                        <input class="form-control @error('caption') is-invalid @enderror"
                        value="{{ old('image') ?? $user->profile->image }}"
                        type="file" name="image" id="image">

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
