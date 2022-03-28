@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.NQoFPy-J3909YTr_Mw0Y5gAAAA%26pid%3DApi&f=1" class="rounded-circle" style="max-width: 170px;">
        </div>
        <div class="col-9 p-8">
            <div class="pt-5">
                <h1>{{ $user->username }}</h1>
            </div>
            <div class="d-flex">
                <div class="pe-5"><strong>153</strong> post</div>
                <div class="pe-5"><strong>23k</strong> followers</div>
                <div class="pe-5"><strong>212</strong> following</div>
            </div>
            <div class="pt-3 fw-bold ">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description}}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div><img src="https://cdn.pixabay.com/photo/2021/08/05/12/36/software-development-6523979__340.jpg" class="w-100"></div>
        </div>
        <div class="col-4">
            <img src="https://cdn.pixabay.com/photo/2016/11/19/14/00/code-1839406__340.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://cdn.pixabay.com/photo/2019/06/17/19/48/source-4280758__340.jpg" class="w-100">
        </div>
    </div>
</div>
@endsection