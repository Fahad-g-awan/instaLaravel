@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-8 offset-2">
        <div class="card-body">
            <form method="POST" action="/p" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <label for="caption" class="col-form-label text-md-start">Post Caption</label>

                    <div>
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <label for="image" class="col-form-label text-md-start">Post Image</label>

                    <div>
                        <input class="form-control @error('caption') is-invalid @enderror"
                        value="{{ old('image') }}"
                        type="file" name="image" id="image">

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
