@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-md-flex justify-content-between align-items-baseline mb-3">
                <div class="d-flex align-items-center">
                    <div class="h4">{{ $user->username }}</div>

                    <follow-button
                    user-id="{{ $user->id }}"
                    follows="{{ $follows }}">
                    </follow-button>
                </div>

                <div class="d-flex align-items-baseline">
                    @can('update', $user->profile)
                        <a class="text-decoration-none border p-2 link-secondary"
                        href="/profile/{{ Auth::user()->id }}/edit">
                            Edit Profile
                        </a>
                    @endcan

                    @can('update', $user->profile)
                        <a href="/p/create"
                        class="border text-decoration-none ms-4 link-secondary"
                        style="font-size: 20px; padding: 2.9px 10px;"
                        title="Add New Post">
                            +
                        </a>
                    @endcan
                </div>
            </div>
            <div class="d-flex">
                <div><strong>{{ $postCount }}</strong> Posts</div>
                <div class="ps-5"><strong>{{ $followersCount }}</strong> Followers</div>
                <div class="ps-5"><strong>{{ $followingCount }}</strong> Following</div>
            </div>
            <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
            <div>
                {{ $user->profile->description }} 
            </div>
            <div><a href="#" class="link-secondary text-decoration-none">{{ $user->profile->url ?? 'N/A' }}</a></div>
        </div>
    </div>
    <div class="row pt-5">

        @foreach($user->posts as $post) 
        <div class=" col-md-4 mb-4">
            <a href="/p/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class="w-100 img-fluid"></a>
        </div>
        @endforeach
    </div>
</div>
@endsection


