@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card m-auto" style="max-width: 80%;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <img src="/storage/{{ $post->image }}"
                    class="w-100"
                    style="max-width: 500px;">
                </div>
                <div class="col-md-5 mt-4">
                    <div class="d-flex align-items-center">
                        <div class="pe-3">
                            <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px">
                        </div>
                        <div>
                            <strong>
                                <a href="/profile/{{ $post->user->id }}"
                                class="text-dark text-decoration-none">
                                    {{ $post->user->username }}
                                </a>
                            </strong>
                        </div>
                    </div>

                    <hr>

                    <p>
                        <strong>
                            <a href="/profile/{{ $post->user->id }}"
                            class="text-dark text-decoration-none">
                                {{ $post->user->username }}
                            </a>
                        </strong>
                        {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
