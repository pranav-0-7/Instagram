<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(\App\Post $post)
    {
        $data = request()->validate([
            'comment'=>'required',
        ]);

        auth()->user()->comments()->create([
            'comment' => $data['comment'],
        ]);

        return redirect('/p/$post->id');
    }
}
