<?php

namespace App\Http\Controllers;

use App\Mail\SendEmailGoogle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
   public function ViewLogin()
   {
        return view('Components.LoginView',[
            'Title'=>'Login'
        ]);
   }

   public function Login(Request $Req)
   {
       $Req -> validate([
            'email'=>'required',
            'password'=>'required'
       ],[
        'email.required'=>'Upps email wajib diisi',
        'password.required'=>'Upps password wajib di isi'
    ]);

    $infoLogin=[
        'email'=> $Req->email,
        'password'=> $Req->password    
    ];

    $kegiatanTamu ='Berhasil Login'; 
    $dt= Carbon::now();
    $todayDate= $dt->toDayDateTimeString();
    
    $name = $Req->email;

    $ActifityLog =[
      'name'=>$name,
      'date_time'=>$todayDate,
      'KegiatanTamu'=>$kegiatanTamu
    ];
    
    
    if(Auth::attempt($infoLogin)){
        DB::table('aktifitas_tamus')->insert($ActifityLog);
        return redirect('/DaftarTamu')->with('succes','berhasil login');
    }else
    {
        return redirect('/Login')->withErrors('email dan password tidak falid');
    }

   }

   public function RegisterView()
   {
        return view('Components.RegisterView',[
            'Title'=>'Register'
        ]);
    }

    public function Register(Request $Req)
    {
        Session::flash('name',$Req->name);
        Session::flash('email',$Req->email);
        $Req -> validate([
             'name'=>'required|min:5|max:15',
             'email'=>'required|email|unique:users',
             'password'=>'required|min:6'
        ],[
         'name.required'=>'upps nama minimal lebih dari 5 huruf',
         'email.required'=>'Upps email tidak sesuai',
         'password.required'=>'upps password Minimal lebih dari 6 huruf'
     ]);
 
     $data = [
            'name' => $Req -> name,
            'email' => $Req -> email,
            'password' => Hash::make($Req->password)
        ];
    
     User::create($data);
     event(new Registered($data));

     Mail::to($Req->email)
     ->Send(new SendEmailGoogle());

     $kegiatanTamu='Berhasil Register';
     $dt=Carbon::now();
     $todayDate=$dt->toDayDateTimeString();
     $name=$Req->name;

     $ActifityLog=[
        'name'=>$name,
        'date_time'=>$todayDate,
        'kegiatanTamu'=>$kegiatanTamu    
     ];

     DB::table('aktifitas_tamus')->insert($ActifityLog);
     return redirect('/email/verify');
    }
}
