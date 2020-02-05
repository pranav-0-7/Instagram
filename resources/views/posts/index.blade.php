@extends('layouts.app')
@section('content')
<div class="container">
   @foreach ($posts as $post)
   
   <div class="d-flex align-items-center modal-dialog mb-2" style="pointer-events:auto;">
        <div class="pr-3">
            <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width:50px">
        </div>
        <div>
            <span class="font-weight-bold">
                <a href="/profile/{{$post->user->id}}">
                    <span class="text-dark">{{ $post->user->username }}</span>
                </a>
            </span>
        </div>
    </div>
   
    <div class="row pt-0">
        <div class="col-6 offset-3">
            <a href="/profile/{{$post->user->id}}">
                <img src="/storage/{{$post->image}}" class="w-100">
            </a>
        </div>
    </div>

    <div class="row pt-4 pb-4"> 
        <div class="col-6 offset-3">

            <div class="d-flex">
                {{-- <img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100" style="max-width:35px"> --}}
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span> {{$post->caption}}
                </p>
            </div>

            <div class="comment">
                <form method="POST" class="d-flex align-items-center form-horizontal" >
                     <label for="comment"></label>
                     <input type="form-control" id="comment" placeholder="Add a comment..." style="border:white" class="form-control">
                     <button type="button" class="ml-3 btn btn-outline-primary btn-md">Post</button>
                </form>
            </div>
            <br>
            <br>
        </div>
    </div>
    
   @endforeach
   <div class="row" >
       <div class="col-12 d-flex justify-content-center">
           {{$posts->links()}}
       </div>

   </div>
</div>
@endsection
