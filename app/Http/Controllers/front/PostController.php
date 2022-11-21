<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected function index(){
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        return view('front.blog',compact('posts'));

    }
}
