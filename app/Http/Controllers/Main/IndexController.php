<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(5);
        $categories = Category::has('post')->orderBy('title')->get();
        $tags = Tag::has('post')->orderBy('title')->get();
        $admin = User::ROLE_ADMIN;
        return view('main.index', compact('posts', 'categories', 'tags', 'admin'));
    }
}
