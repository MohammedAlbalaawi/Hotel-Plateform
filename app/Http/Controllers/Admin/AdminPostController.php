<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostStoreRequest $request)
    {
        $post = $request->validated();
        $post['photo'] = $request->file('photo')->store('posts');
        $post['total_views'] = 0;


        Post::create($post);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post added successfully');
    }

    public function edit(Post $model)
    {
        return view('admin.posts.edit', compact('model'));
    }

    public function update(PostStoreRequest $request, Post $model)
    {
        if ($request->hasFile('photo')) {

            if ($model->photo && Storage::exists($model->photo)) {
                Storage::delete($model->photo);
            }

            $model->photo = $request->file('photo')->store('posts');
        }

        $model->update([
            'heading' => $request->heading,
            'short_content' => $request->short_content,
            'content' => $request->long_content,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Post $model)
    {
        if ($model->photo && Storage::exists($model->photo)) {
            Storage::delete($model->photo);
        }

        $model->delete();
        return redirect()
            ->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
