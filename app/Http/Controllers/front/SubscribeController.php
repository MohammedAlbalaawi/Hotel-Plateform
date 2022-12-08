<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use App\Mail\Websitemail;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function send(SubscribeRequest $request, Subscribe $model)
    {

        if (!$request->all()) {
            return response()
                ->json(['success' => false, 'error' => $request->all()->errors()->toArray()], 400);
        }


        $request->merge([
            'token' => hash('sha256', time()),
        ]);

        $model->create($request->all());

        $verification_link = url('subscribe/verify/' . $request->email . "/" . $request->token);

        $subject = "Subscription Verification";
        $message = "Confirm Verification: <br>";
        $message .= "<a href='" . $verification_link . "'>Click Here</a>";

        Mail::to($request->email)->send(new Websitemail($subject, $message));

        return response()
            ->json(['success' => 'Thank you, Please verify your email.'], 200);
    }

    public function verify(Subscribe $model, $token)
    {

        if ($model && $model->token == $token) {
            $model->update([
                'token' => '',
                'status' => 1
            ]);
            return redirect()->route('home')->with('success', 'Thank you for subscribe');
        } else {
            return redirect()->route('home')->with('error', 'Link not Valid');
        }
    }
}
