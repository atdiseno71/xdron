<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\DemoMail;
use Mail;

class MailController extends Controller
{
    public function index() {

        $mailData = [
            'title' => 'Mail from XGRON',
            'body' => 'This is for testing email usign smtp',
        ];

        Mail::to('jorgetecno38981@gmail.com')->send(new DemoMail($mailData));

        dd('Email send successfully');

    }
}
