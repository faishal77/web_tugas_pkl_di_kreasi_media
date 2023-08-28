<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacebookId extends Controller
{
    public function RedirectFacebook()
    {
        return Socialite::driver('facebook')->Redirect();
    }

    public function facebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $findUser = User::where('Facebook_id',$user->id->first());

            dd($user);
            if ($findUser) {
                Auth::login($findUser);
                return redirect('DaftarTamu');
            }
            else{
                $newUser= User::updateOrCreate(['email',$user->email],[
               'name'=>$user->name,
               'Facebook_id'=>$user->id,
               'password'=>Hash::make('password')   
                ]);

                Auth::login($newUser);
                return redirect('DaftarTamu');
            }
        } catch (\Throwable $e) {
        }
    }
}
