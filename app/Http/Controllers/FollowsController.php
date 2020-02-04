<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    public function __construct(User $user)
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {   
        //return $this->user->find($user)->username;
        return auth()->user()->following()->toggle($user->profile);
    }
}
