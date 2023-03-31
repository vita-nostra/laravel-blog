<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $categories = Category::has('post')->orderBy('title')->get();
        $tags = Tag::has('post')->orderBy('title')->get();
        $admin = User::ROLE_ADMIN;

        $date = Carbon::parse($post->created_at);
        return view('post.show', compact('post', 'categories', 'tags', 'admin', 'date'));
    }
}
