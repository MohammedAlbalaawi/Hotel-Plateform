<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.contact');
    }

    public function send(ContactRequest $request)
    {

        if (!$request->all()) {
            return response()
                ->json(['success' => false, 'error' => $request->all()->errors()->toArray()], 400);
        }

        Mail::to('m.cip@live.com')->send(new ContactMail($request->all()));
        return response()
            ->json(['success' => 'Thank you, Email send successfully.'], 200);

    }
}
