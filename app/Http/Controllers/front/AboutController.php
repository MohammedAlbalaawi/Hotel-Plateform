<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){

        $page_data = Page::where('id', '=', 1)->first();

        if($page_data == null){
            return redirect()
                ->route('home')
                ->with('error', 'About page has no data to view');
        }
        return view('front.about', compact('page_data'));
    }
}
