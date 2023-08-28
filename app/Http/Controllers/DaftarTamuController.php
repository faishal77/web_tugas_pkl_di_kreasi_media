<?php

namespace App\Http\Controllers;


use App\Models\aktifitas_tamu;
use App\Models\DaftarTamu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\returnCallback;

class DaftarTamuController extends Controller
{
    // !! Controller Daftar Tamu

    public function DaftarTamuView()
    {
        return view('Components.Home',[
            'Title'=>'Home'
        ]);
    }

    public function Update(Request $Req,$id)
    {

        $Req -> validate([
            'nama'=>'required|min:1',
            'Alamat'=>'required|min:1',
            'No_Hp'=>'required|min:11|max:14'     
       ],[
            'nama.required'=>'Upps namanya ga boleh kosong',
            'Alamat.required'=>'Upps Alamat ga boleh kosong',
            'No_Hp.required'=>'Upps no hp ga boleh kosong atau kepanjangan'
      ]);

      $data = [
            'nama'=>$Req->input('nama'),
            'Alamat'=>$Req->input('Alamat'),
            'No_Hp'=>$Req->input('No_Hp')
      ];

      DaftarTamu::where('id',$id)->update($data);


      $name=$Req->input('nama');
      $td=Carbon::now();
      $time=$td->toDayDateTimeString();
      $KegiatanTamu='Berhasil Mengubah Daftar Tamu';

      $ActifityLog=
      [
        'name'=>$name,
        'date_time'=>$time,
        'KegiatanTamu'=>$KegiatanTamu  
      ];

      DB::table('aktifitas_tamus')->insert($ActifityLog);
      return redirect('/DaftarTamu')->with('succes add data','berhasil merubah daftar tamu');

    }

    public function UbahView($id)
    {
       $data = DaftarTamu::where('id',$id)->first();
       return view('Components.editview')->with('data',$data);
    }

    public function getUserAll()
    {
        $data = DaftarTamu::orderBy('id','asc')->paginate(5);
        return view('Components.Home',[
            'Title'=>'Home'    
        ])->with('data',$data);
    }


    // !! Controller Absensi
    
    public function AbsenView()
    {
        return view('Components.Absen',[
            'Title'=>'Absen'
        ]);
    }
    
    
    public function Absen(Request $Req)
    {
        Session::flash('nama',$Req->nama);
        Session::flash('Alamat',$Req->Alamat);
        Session::flash('No_Hp',$Req->No_Hp);

        $Req -> validate([
            'nama'=>'required|min:1|unique:Daftar_Tamus',
            'Alamat'=>'required|min:1',
            'No_Hp'=>'required|min:11|unique:Daftar_Tamus|max:13'     
       ],[
            'nama.required'=>'Upps namanya ga boleh kosong',
            'Alamat.required'=>'Upps Alamat ga boleh kosong',
            'No_Hp.required'=>'Upps no hp ga boleh kosong atau kepanjangan'
      ]);

      $data = [
            'nama'=>$Req->input('nama'),
            'Alamat'=>$Req->input('Alamat'),
            'No_Hp'=>$Req->input('No_Hp')
      ];

      DaftarTamu::create($data);
      
      $kegiatanTamu ='Menambahkan Daftar Tamu'; 
      $dt= Carbon::now();
      $todayDate= $dt->toDayDateTimeString();
      
      $name = $Req->nama;

      $ActifityLog =[
        'name'=>$name,
        'date_time'=>$todayDate,
        'KegiatanTamu'=>$kegiatanTamu
      ];
      
      DB::table('aktifitas_tamus')->insert($ActifityLog);

      return redirect('/DaftarTamu')->with('succes add data','succes menambahkan daftar tamu');
    }

    // !! Controller Profile
    public function ProfileView()
    {
        return view('Components.Profile',[
            'Title'=>'Profile'
        ]);
    }

    // !! LogOut
    public function LogOut()
    {
        $user = Auth::User();

        $kegiatanTamu='Berhasil LogOut';
        $dt=Carbon::now();
        $todayDate=$dt->toDayDateTimeString();
        $name = $user->name;

        $ActifityLog=[
            'name'=>$name,
            'date_time' =>$todayDate,
            'KegiatanTamu'=>$kegiatanTamu   
        ];

        DB::table('aktifitas_tamus')->insert($ActifityLog);
        Auth::logout();
        return redirect('/')->with('succes','succes Logout');
    }

    // !! Delete daftar tamu
    public function Delete($name)

    {
        DaftarTamu::where('nama',$name)->delete();
        $kegiatanTamu ='Menghapus Daftar Tamu'; 
        $dt= Carbon::now();
        $todayDate= $dt->toDayDateTimeString();
        
        $name = $name;
  
        $ActifityLog =[
          'name'=>$name,
          'date_time'=>$todayDate,
          'KegiatanTamu'=>$kegiatanTamu
        ];
        
        DB::table('aktifitas_tamus')->insert($ActifityLog);
        return redirect('/DaftarTamu')->with('succes add data','berhasil Menghapus daftar tamu');
    }

    // !! Aktifitas Tamu

    public function AktifitasTamu()
    {
        $data = aktifitas_tamu::orderBy('id','asc')->paginate(8);
        return view('Components.AktifitasTamu',[
            'Title'=>'AktifitasTamu'    
        ])->with('data',$data);
    }
}
