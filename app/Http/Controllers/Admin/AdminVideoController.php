<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoStoreRequest;
use App\Models\Video;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(VideoStoreRequest $request)
    {
        Video::create($request->all());

        return redirect()
            ->route('videos.index')
            ->with('success', 'Video added successfully');
    }

    public function edit(Video $model)
    {
        return view('admin.videos.edit', compact('model'));
    }

    public function update(VideoStoreRequest $request, Video $model)
    {

        $model->update($request->all());

        return redirect()
            ->route('videos.index')
            ->with('success', 'Video updated successfully');
    }

    public function destroy(Video $model)
    {
        $model->delete();
        return redirect()
            ->route('videos.index')
            ->with('success', 'Video deleted successfully');
    }
}
