<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {

        $slide_data = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif,webp',
            'heading' => 'string|nullable',
            'text' => 'string|nullable',
            'button_text' => 'string|nullable',
            'button_url' => 'string|nullable',
        ]);

        $slide_data['photo'] = $request->file('photo')->store('slides');

        Slider::create($slide_data);

        return redirect()
            ->route('admin_slide_view')
            ->with('success', 'Slide added successfully');
    }

    public function edit($id)
    {
        $slide_data = Slider::where('id',$id)->first();
        return view('admin.slide_edit',compact('slide_data'));
    }

    public function update(Request $request,$id)
    {

        $slide_data = Slider::where('id', $id)->first();

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif,webp'
            ]);

            if ($slide_data->photo && Storage::exists($slide_data->photo)) {
                Storage::delete($slide_data->photo);
            }

            $slide_data->photo = $request->file('photo')->store('slides');
        }

        $slide_data->heading = $request->heading;
        $slide_data->text = $request->text;
        $slide_data->button_text = $request->button_text;
        $slide_data->button_url = $request->button_url;
        $slide_data->update();

        return redirect()
            ->back()
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