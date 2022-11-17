<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureStoreRequest;
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
}
