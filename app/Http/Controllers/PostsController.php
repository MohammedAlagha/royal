<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();
        return view('front.blog',compact('posts'));
    }

    public function show(Post $post)
    {
        return view('front.single_post',compact('post'));
    }
}
