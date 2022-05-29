@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    
        <div class="row">
            <div class="col-md-6 offset-3">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}"
                    class="w-100"
                    >
                </a>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-6 offset-3 mt-2 mb-4">
                <strong>
                    <a href="/profile/{{ $post->user->id }}"
                    class="text-dark text-decoration-none">
                        {{ $post->user->username }}
                    </a>
                </strong>
                {{ $post->caption }}
            </div>
        </div>
            
    @endforeach

    <!-- Pagination -->
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
