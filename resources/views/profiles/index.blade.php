@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" style="max-height:170px;" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">

            <div class="d-flex justify-content-between align-items-baseline">

                <div class="d-flex align-items-center  pb-3">
                    <div class="h4">{{$user->username}}</div> 
                     
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update',$user->profile)
                <button class="btn btn-primary" style="background-color: ghostwhite"><a href="/p/create">Add New Post</a></button>
                @endcan

            </div>

            <div class="d-flex">
                @can('update',$user->profile)
                <button class="btn btn-primary" style="background-color: ghostwhite"><a href="/profile/{{$user->id}}/edit">Edit Profile</a></button>
                @endcan
            </div>

            <div class="d-flex pt-3">
                <div class="pr-5"><strong>{{$postCount}}<br></strong>Posts</div>
                <div class="pr-5"><strong>{{ $followersCount}}<br></strong>Followers</div>
                <div class="pr-5"><strong>{{$followingCount}}<br></strong>Following</div>
            </div>

            <div class="pt-2"><strong>{{ $user->profile->title }}</strong></div>
            <div><p>{{$user->profile->description}}</p></div>
            <div class="pb-0  font-weight-bold"><a href="https://en.wikipedia.org/wiki/Kobe_Bryant">{{ $user->profile->url ?? 'N/A'}}</a></div>
        </div>

        <div class="col-12 d-flex justify-content-center">
            <div class="pr-5">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRKCzU5dyVy1HkucM2O6jfmNk6AcXCSJdnx5Mi6Aws5DySDpqB6" style="max-height: 30px;"> 
                <strong>POSTS</strong>
            </div> 
            <div class="pr-5">
                <img src="https://cdn.dribbble.com/users/59859/screenshots/4703246/dribbble_42_mr_1x.png" style="max-height: 30px;"> 
                <strong>TAGS</strong>
            </div>
        </div>
    </div>
    
    <div class="row pt-5">
        @foreach ($user->posts as $post)
        <div class="col-4 pb-4 d-flex">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{ $post->image}}" class="w-100 pr-5">
            </a>
        </div>
        @endforeach
            {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR827ymu-AX1ylovkXa-lveMtymy-9_OnevYR0P1ckQYRCGhPUU" class="w-100 pr-5">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT6qcQbGZJhRBEIvXojWNAZeNYHdO5QR032_uWiBlSzoTTlJHMi" class="w-100 pr-5">
            <img src="https://image.businessinsider.com/582f8f87e02ba71e008b5680?width=1100&format=jpeg&auto=webp" class="w-100 pr-5"> --}}
    </div>
    {{-- <div class="row pt-5">
        <div class="col-4 d-flex">
            <img src="http://debrzno.pl/wp-content/uploads/2018/11/redakcja.jpg?w=640" class="w-100 pr-5">
            <img src="https://i.pinimg.com/originals/ea/f8/83/eaf8835ad1e7878b1da991aada9e3529.jpg" class="w-100 pr-5">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSGioE2-5Smpe8eR3ShIuGNKuovpKMYaGzvH4FDMx3-_1fNpLO-" class="w-100 pr-5">
        </div>
    </div>
    <br>
    <div class="row pt-5">
        <div class="col-4 d-flex">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRmX0UE2lEwe9hv1-QBLQU0CTDVIiNGvCBjkmzc-7RlTMbquNNc" class="w-100 pr-5">
            <img src="https://i2.wp.com/geoawesomeness.com/wp-content/uploads/2016/12/Macbook-Pro-Web-Map-Coding-Programming-Geoawesomeness.jpg?fit=2252%2C1472&ssl=1" class="w-100 pr-5">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ_qq40ZVSCM83Beoo4yWfb_-PbEroEsx87UK0dprTPGYEXuZoG" class="w-100 pr-5">
        </div>
    </div> --}}
</div>
@endsection
