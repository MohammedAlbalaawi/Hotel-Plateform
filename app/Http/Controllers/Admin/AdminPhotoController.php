<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoStoreRequest;
use App\Models\Photo;

class AdminPhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::get();
        return view('admin.photos.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.photos.create');
    }

    public function store(PhotoStoreRequest $request)
    {
        $photo = $request->validated();
        $photo['photo'] = $request->file('photo')->store('photos');


        Photo::create($photo);

        return redirect()
            ->route('photos.index')
            ->with('success', 'Photo added successfully');
    }
}
