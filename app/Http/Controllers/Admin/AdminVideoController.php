<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::get();
        return view('admin.videos.index', compact('videos'));
    }
}
