<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Post;


class LandingController extends Controller
{
    public function show() {
        $post = Post::latest()->first();
        $blurb = explode(' ', $post->body, 20);
        $blurb = array_slice($blurb, 0, 19);
        $blurb = implode(' ', $blurb);
        $post->blurb = $blurb;
        $date = strtotime($post->published_at);
        $date = date('M d Y', $date);
        $post->formattedDate = $date;
//        ddd($post->blurb);

        return view('pages.landing', [
            'post'=> $post
        ]);
    }

    public function sendMail()
    {

        request()->validate(['email'=>'required|email']);

        Mail::send('emails.formemail', ['name' => request('name'), 'body' => request('body'), 'email' => request('email')], function ($message) {
            $message->from('newcontact@livingdesignsinc.com');
            $message->to('chris@livingdesignsinc.com')->subject('New Contact from Website');
        });

        return redirect('/')->with('postMessage', 'Success');


    }

}
