<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index(){
        $all_slides = Slider::get();
        return view('front.home',compact('all_slides'));
    }
}
