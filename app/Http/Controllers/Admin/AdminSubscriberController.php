<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class AdminSubscriberController extends Controller
{
    public function index(){
        $subscribers = Subscribe::where('status',1)->get();
        return view('admin.subscribers.index', compact('subscribers'));
    }
}
