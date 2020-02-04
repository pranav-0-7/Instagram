<?php

namespace App\Http\Controllers;
use App\User;
use App\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        // This is the old way
       // $user = User::with('profile')->findOrFail($user);
        //dd($user); 
        // return view('profiles.index',compact('user')[
        //     'user' => $user,
        //     ]);

        //New way
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postCount = Cache::remember(
            'count.posts.' . $user->id, 
            now()->addSeconds(30), 
            function() use ($user) {
                return $user->posts->count();
        });

        $followersCount=$user->profile->followers->count();
        $followingCount=$user->following->count();
        // $followersCount = Cache::remember(
        //     'count.followers.' . $user->id, 
        //     now()->addSeconds(30), 
        //     function() use ($user) {
        //         return $user->profile->followers->count();
        // });
        
        // $followingCount = Cache::remember(
        //     'count.following.' . $user->id, 
        //     now()->addSeconds(30), 
        //     function() use ($user) {
        //         return $user->following->count();
        // });
        //dd($follows);
        return view('profiles.index',compact('user','follows','postCount','followersCount','followingCount'));
  
    }

    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }
    
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',
        ]);
    
        if(request('image')) {
            $imagePath = request('image')->store('profile','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }
        //dd($data);

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
        //dd($data);
    }
}
