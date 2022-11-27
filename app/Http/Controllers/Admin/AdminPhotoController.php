<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoStoreRequest;
use App\Http\Requests\PhotoUpdateRequest;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

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

    public function edit(Photo $model)
    {
        return view('admin.photos.edit', compact('model'));
    }

    public function update(PhotoUpdateRequest $request, Photo $model)
    {
        if ($request->hasFile('photo')) {

            if ($model->photo && Storage::exists($model->photo)) {
                Storage::delete($model->photo);
            }

            $model->photo = $request->file('photo')->store('photos');
        }

        $model->update([
            'caption' => $request->caption,
        ]);

        return redirect()
            ->route('photos.index')
            ->with('success', 'Photo updated successfully');
    }

    public function destroy(Photo $model)
    {
        if ($model->photo && Storage::exists($model->photo)) {
            Storage::delete($model->photo);
        }

        $model->delete();
        return redirect()
            ->route('photos.index')
            ->with('success', 'Photo deleted successfully');
    }
}
