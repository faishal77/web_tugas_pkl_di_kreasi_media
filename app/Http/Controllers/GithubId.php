<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubId extends Controller
{
    public function GithubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function GithubCallbak()
    {
     try {
        $user = Socialite::driver('github')->user();
        $findUser= User::where('github_id',$user->getId())->first();
        if ($findUser) {
            Auth::login($findUser);
            return redirect()->intended('DaftarTamu');
        }
        else{
            $newUser= User::create([
           'name'=>$user->nickname,
           'github_id'=>$user->id,
           'email'=>$user->email,
           'password'=>Hash::make('password')   
            ]);

            Auth::login($newUser);

            $kegiatanTamu='Berhasil Login';
            $dt = Carbon::now();
            $todaydate=$dt->toDayDateTimeString();
            $name=$newUser->name;

            $ActifityLog = [
                'name'=>$name,
                'date_time'=>$todaydate,
                'KegiatanTamu'=>$kegiatanTamu
            ];
            
            DB::table('aktifitas_tamus')->insert($ActifityLog);
            return redirect()->intended('DaftarTamu');
            
        } 
     } catch (\Throwable $th) {
        //throw $th;
     }   
    }
}
