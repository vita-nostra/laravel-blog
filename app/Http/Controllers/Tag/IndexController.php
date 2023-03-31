<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $posts = $tag->post()->paginate(5);
        $categories = Category::has('post')->orderBy('title')->get();
        $tags = Tag::has('post')->orderBy('title')->get();
        $admin = User::ROLE_ADMIN;
        return view('post.index', compact('posts', 'categories', 'tags', 'admin'));
    }
}
