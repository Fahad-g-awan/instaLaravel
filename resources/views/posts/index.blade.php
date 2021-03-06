@extends('layouts.app')

@section('content')

<div class="container">

    <div class="mb-2 d-flex justify-content-end align-items-baseline">
        <div class="text-center m-auto">
                Follow someone to see there latest posts in this section.
        </div>
        <div>
            <a class="border p-3 me-3 link-secondary text-decoration-none"
                href="/profile/{{ Auth::user()->id }}">
                My Profile
            </a>
        </div>
        <a class="border p-3 link-secondary text-decoration-none" href="/p/all">
            Scroll all latest Posts
        </a>
    </div>
    <hr>
   
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
