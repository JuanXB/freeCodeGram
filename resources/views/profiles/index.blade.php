@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.NQoFPy-J3909YTr_Mw0Y5gAAAA%26pid%3DApi&f=1" class="rounded-circle" style="max-width: 170px;">
        </div>
        <div class="col-9 p-8">
            <div class="pt-5 d-flex justify-content-between  align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">Add new Post</a>
            </div>
            <div class="d-flex">
                <div class="pe-5"><strong>{{$user->posts->count()}}</strong> post</div>
                <div class="pe-5"><strong>23k</strong> followers</div>
                <div class="pe-5"><strong>212</strong> following</div>
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