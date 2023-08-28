<?php

namespace App\Http\Controllers;


use App\Models\User;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class googleId extends Controller
{
    public function GoogleRedirect()
    {
        return Socialite::driver('google')->Redirect();
    }
    public function GoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id',$user->getId())->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('DaftarTamu');
            }
            else{
                $newUser= User::create([
               'name'=>$user->name,
               'google_id'=>$user->id,
               'email'=>$user->email,
               'password'=>Hash::make('password')   
                ]);

               Auth::login($newUser);
              
               $kegiatanTamu='Berhasil Login';
               $dt=Carbon::now();
               $todayDate=$dt->toDayDateTimeString();
               $name=$newUser->name;
   
               $ActifityLog=[
                   'name'=>$name,
                   'date_time' =>$todayDate,
                   'KegiatanTamu'=>$kegiatanTamu 
         
                ];
               
               DB::table('aktifitas_tamus')->insert($ActifityLog);
                return redirect()->intended('DaftarTamu');
                
            }
        } catch (\Throwable $e) {
 
        }
    }
}
