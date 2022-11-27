<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    protected function index(){
        $photos = Photo::orderBy('id', 'desc')->paginate(4);
        return view('front.photo_gallery',compact('photos'));
    }
}
