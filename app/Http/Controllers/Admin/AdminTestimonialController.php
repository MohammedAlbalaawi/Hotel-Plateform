<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialStoreRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

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

    public function edit(Testimonial $model){
        return view('admin.testimonials.edit',compact('model'));
    }

    public function update(TestimonialUpdateRequest $request, Testimonial $model){
        if ($request->hasFile('photo')) {

            if ($model->photo && Storage::exists($model->photo)) {
                Storage::delete($model->photo);
            }

            $model->photo = $request->file('photo')->store('testimonials');
        }

        $model->update([
            'name' => $request->name,
            'career' => $request->career,
            'comment' => $request->comment,
        ]);

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial updated successfully');
    }

    public function destroy(Testimonial $model)
    {
        if ($model->photo && Storage::exists($model->photo)) {
            Storage::delete($model->photo);
        }

        $model->delete();
        return redirect()->back()->with('success','Testimonial Deleted Successfully');
    }
}
