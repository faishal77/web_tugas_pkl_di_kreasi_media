<?php

namespace App\Http\Controllers;

use App\Mail\SendEmailGoogle;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function SendEmails()
    {
    // $User = User::all();
    Mail::to('faishala607@gmail.com')
    ->Send(new SendEmailGoogle());
    return 'succes kirim email';
    }
}
