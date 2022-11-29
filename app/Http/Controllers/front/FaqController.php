<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $faqs = fAQ::get();
        return view('front.faqs',compact('faqs'));
    }
}
