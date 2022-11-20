<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::get();
        return view('admin.testimonials.index',compact('testimonials'));
    }

    public function create(){
        return view('admin.testimonials.create');
    }
}
