<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function about_edit(){
        $page_data = Page::where('id', '=', 1)->first();
        if($page_data == null){
            return redirect()
                ->route('admin_home')
                ->with('error', 'About page has no data to view');
        }
        return view('admin.pages.about', compact('page_data'));
    }

    public function about_update(Request $request){
        $page_about = Page::where('id', '=', 1)->first();

        $page_about->update([
            'about_heading' => $request->about_heading,
            'about_content' => $request->about_content,
        ]);

        return redirect()
            ->back()
            ->with('success', 'About Page updated successfully');
    }
}
