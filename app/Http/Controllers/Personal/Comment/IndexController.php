<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = auth()->user()->comments;
        $posts = Post::all();
        return view('personal.comment.index', compact('comments', 'posts'));
    }
}
