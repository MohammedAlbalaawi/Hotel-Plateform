<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return view('admin.posts.index', compact('posts'));
    }

    
}
