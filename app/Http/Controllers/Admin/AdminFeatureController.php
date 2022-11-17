<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureStoreRequest;
use App\Http\Requests\FeatureUpdateRequest;
use App\Models\Feature;
use Illuminate\View\View;

class AdminFeatureController extends Controller
{
    public function index()
    {
        $features = Feature::get();
        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(FeatureStoreRequest $request)
    {
        Feature::create($request->all());

        return redirect()
            ->route('adminFeature.view')
            ->with('success', 'Feature added successfully');
    }

    public function edit(Feature $feature)
    {
        return view('admin.features.edit',compact('feature'));
    }

    public function update(FeatureUpdateRequest $request,Feature $feature)
    {
        $feature->update($request->all());

        return redirect()
            ->route('adminFeature.view')
            ->with('success', 'Feature updated successfully');
    }

    public function delete(Feature $feature)
    {
        $feature->delete();
        return redirect()->back()->with('success','Feature Deleted Successfully');
    }
}
