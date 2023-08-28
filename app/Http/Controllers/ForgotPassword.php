<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Controller
{
    public function ViewPassword()
    {
        return view('auth.forgotPassword');
    }

    public function ForgotPasswordPost(Request $Req)
    {
        $Req->validate(['email'=>'required']);

        $status = Password::sendResetLink($Req->only('emai'));

        return $status === Password::RESET_LINK_SENT ? back()->with(['status'=>__($status)]):back()->withErrors(['email'=>__($status)]);
    }

    public function resetPasswordView(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }
}
