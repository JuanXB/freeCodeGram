@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row mx-auto">
        <div class="col-4 offset-2 pb-3">
            <div class="pe-3">
                <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width: 40px;">
                <span class=" fw-bold"> {{$post->user->username}}</span>
            </div>
        </div>
    </div>
    <div class="row  mx-auto">
        <div class="col-4 offset-2">
            <a href="/profile/{{$post->user->id}}">
                <img src="/storage/{{$post->image}}" class="w-100">
            </a>
        </div>
    </div>
    <div class="row pt-2 pb-4 mx-auto">
        <div class="col-4 offset-2">
            <p>
                <span class=" fw-bold">
                    <a href="/profile/{{$post->user->id}}" class=" text-decoration-none">
                        <span class="text-dark"> {{$post->user->username}}</span>
                    </a>
                </span>
                {{$post->caption}}
            </p>

        </div>
    </div>

    @endforeach
    <div class="row d-flex justify-content-center">
        <div class="col-4">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection