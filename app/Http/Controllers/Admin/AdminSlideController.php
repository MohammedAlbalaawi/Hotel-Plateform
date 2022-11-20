<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideStoreRequest;
use App\Http\Requests\SlideUpdateRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSlideController extends Controller
{
    public function index()
    {
        $slides = Slider::paginate(3);
        return view('admin.slide_view', compact('slides'));
    }

    public function create()
    {
        return view('admin.slide_create');
    }

    public function store(SlideStoreRequest $request)
    {
        $slide = $request->validated();
        $slide['photo'] = $request->file('photo')->store('slides');

        Slider::create($slide);

        return redirect()
            ->route('adminSlider.view')
            ->with('success', 'Slide added successfully');
    }

    public function edit(Slider $slider)
    {
        // $slide_data = Slider::where('id',$id)->first();
        return view('admin.slide_edit',compact('slider'));
    }

    public function update(SlideUpdateRequest $request,Slider $slider)
    {

        if ($request->hasFile('photo')) {

            if ($slider->photo && Storage::exists($slider->photo)) {
                Storage::delete($slider->photo);
            }

            $slider->photo = $request->file('photo')->store('slides');
        }

        $slider->update([
            'heading' => $request->heading,
            'text' => $request->text,
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
        ]);

        return redirect()
            ->route('adminSlider.view')
            ->with('success', 'Slider updated successfully');
    }

    public function delete(Slider $slider)
    {
        if ($slider->photo && Storage::exists($slider->photo)) {
            Storage::delete($slider->photo);
        }

        $slider->delete();
        return redirect()->back()->with('success','Slide Deleted Successfully');
    }

}
