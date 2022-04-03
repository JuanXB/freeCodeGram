@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
        </div>
        <div class="col-9 p-8">
            <div class="pt-5 d-flex justify-content-between  align-items-baseline">
                <div class="d-flex  align-items-center pb-3">
                    <h1>{{ $user->username }}</h1>
                    <follow-button user_id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>
                @can('update', $user->profile)
                <a href="/p/create">Add new Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pe-5"><strong>{{$postsCount}}</strong> post</div>
                <div class="pe-5"><strong>{{$followersCount}}</strong> followers</div>
                <div class="pe-5"><strong>{{$followingCount}}</strong> following</div>
            </div>
            <div class="pt-3 fw-bold ">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description}}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row">
        @foreach ($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>

        </div>
        @endforeach
    </div>
</div>
@endsection