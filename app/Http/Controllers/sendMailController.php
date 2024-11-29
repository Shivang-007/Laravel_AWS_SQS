<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Http\Request;

class sendMailController extends Controller
{
    public function showForm()
    {
        return view('email.send-mail-form');
    }

    public function sendMailToUser(Request $request)
    {       
        $validated = $request->validate([
            'email' => 'required|email',
            'content' => 'required|string',
        ]);
            
        dispatch(new SendMailJob($validated['email'], $validated['content']));

        return back()->with('success', 'Email has been queued successfully!');
    }
}
