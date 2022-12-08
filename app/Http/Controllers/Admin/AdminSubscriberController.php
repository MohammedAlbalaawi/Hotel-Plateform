<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberSendEmailRequest;
use App\Mail\Websitemail;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminSubscriberController extends Controller
{
    public function index(){
        $subscribers = Subscribe::where('status',1)->get();
        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function create(){
        return view('admin.subscribers.create');
    }

    public function store(SubscriberSendEmailRequest $request){
        $subject = $request->subject;
        $message = $request->message;

        $verifiedSubscribers = Subscribe::where('status',1)->get();

        foreach ($verifiedSubscribers as $subscriber){
            Mail::to($subscriber->email)->send(new Websitemail($subject, $message));
        }

        return redirect()->back()->with('success','Email has been sent successfully');
    }
}
