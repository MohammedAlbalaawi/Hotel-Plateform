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
        $slides = Slider::all();
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
            ->route('admin_slide_view')
            ->with('success', 'Slide added successfully');
    }

    public function edit($id)
    {
        $slide_data = Slider::where('id',$id)->first();
        return view('admin.slide_edit',compact('slide_data'));
    }

    public function update(SlideUpdateRequest $request,$id)
    {
        $slide = $request->validated();

        $slide = Slider::where('id', $id)->first();

        if ($request->hasFile('photo')) {

            if ($slide->photo && Storage::exists($slide->photo)) {
                Storage::delete($slide->photo);
            }

            $slide->photo = $request->file('photo')->store('slides');
        }

        $slide->heading = $request->heading;
        $slide->text = $request->text;
        $slide->button_text = $request->button_text;
        $slide->button_url = $request->button_url;
        $slide->update();

        return redirect()
            ->route('admin_slide_view')
            ->with('success', 'Slider updated successfully');
    }

    public function delete($id)
    {
        $slide_data = Slider::where('id', $id)->first();

        if ($slide_data->photo && Storage::exists($slide_data->photo)) {
            Storage::delete($slide_data->photo);
        }

        $slide_data->destroy($id);
        return redirect()->back()->with('success','Slide Deleted Successfully');
    }

}