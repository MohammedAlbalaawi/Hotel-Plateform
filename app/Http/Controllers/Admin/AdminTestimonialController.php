<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialStoreRequest;
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

    public function store(TestimonialStoreRequest $request)
    {
        $testimonal = $request->validated();
        $testimonal['photo'] = $request->file('photo')->store('testimonials');

        Testimonial::create($testimonal);

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial added successfully');
    }
}
