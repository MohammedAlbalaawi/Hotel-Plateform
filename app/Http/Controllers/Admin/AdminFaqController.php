<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqStoreRequest;
use App\Http\Requests\FaqUpdateRequest;
use App\Models\Faq;

class AdminFaqController extends Controller
{
    public function index(){
        $faqs = Faq::get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create(){
        return view('admin.faqs.create');
    }

    public function store(FaqStoreRequest $request)
    {
        Faq::create($request->all());

        return redirect()
            ->route('faqs.index')
            ->with('success', 'Faq added successfully');
    }

    public function edit(Faq $model)
    {
        return view('admin.faqs.edit',compact('model'));
    }

    public function update(FaqUpdateRequest $request,Faq $model)
    {
        $model->update($request->all());

        return redirect()
            ->route('faqs.index')
            ->with('success', 'Faq updated successfully');
    }

    public function destroy(Faq $model)
    {
        $model->delete();
        return redirect()->back()->with('success','Faq Deleted Successfully');
    }
}
