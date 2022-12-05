<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageStoreRequest;
use App\Models\Page;
use Illuminate\Support\Str;

class AdminPageController extends Controller
{
    public function index(){
        $pages = Page::get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(PageStoreRequest $request)
    {

        Page::create($request->all());

        return redirect()
            ->route('pages.index')
            ->with('success', 'Page added successfully');
    }

    public function edit(Page $model)
    {
        return view('admin.pages.edit', compact('model'));
    }

    public function update(PageStoreRequest $request, Page $model)
    {
        $model->update($request->all());

        return redirect()
            ->route('pages.index')
            ->with('success', 'Page updated successfully');
    }

    public function destroy(Page $model)
    {
        $model->delete();
        return redirect()
            ->route('pages.index')
            ->with('success', 'Page deleted successfully');
    }
}
