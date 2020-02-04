<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/yI7jeklFGUGJSzVPNXxkT0M7i674muVcFB0ISxnQ.jpeg';

        return '/storage/' . $imagePath;
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
    