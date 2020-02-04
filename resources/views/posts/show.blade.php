@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
       <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100">
       </div>
       <div class="col-4">
           <div>
               <div class="d-flex align-items-center">
                   <div class="pr-2">
                       <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width:35px">
                   </div>
                   <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                            <a href="#" class="pl-2">Follow</a>
                        </div>
                   </div>
               </div>


               <hr>

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
                   <form class="d-flex align-items-center form-horizontal">
                        <label for="comment"></label>
                        <input type="form-control" id="comment" placeholder="Add a comment..." style="border:white" class="form-control">
                        <button type="button" class="ml-3 btn btn-outline-primary btn-md">Post</button>
                   </form>
               </div>
            </div>
       </div>
   </div>
</div>
@endsection
