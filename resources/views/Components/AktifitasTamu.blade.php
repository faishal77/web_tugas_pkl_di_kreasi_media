<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="nav">
        <div class="logo">
         <h4>Faishal Amir</h4>
        </div>
        <div class="ul">
         <li class=" {{ ($Title === "Home")? "actif" : "" }}"><a href="/DaftarTamu">Daftar Tamu</a>
         </li>
         <li class="{{ ($Title === "Absen")? "actif" : "" }}" ><a href="/Absen">Absen </a>
         <li class="{{ ($Title === "Profile")? "actif" : "" }}"><a href="/Profile">Profile</a> 
         </li>
         <li class="{{ ($Title === "AktifitasTamu")? "actif" : "" }}"><a href="/AktifitasTamu">Aktifitas Tamu</a> 
         </li>
        </div>
        <a href="/LogOut"><button class="butten1">Log Out</button></a>
     </div>   

     <h1 class="texttamu">Aktivitas Tamu</h1>
     <div class="border">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Aktifitas Tamu</th>
                <th scope="col">Keterangan Waktu</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ($data as $datas )  
              <tr>               
                <td>{{ $datas->name }} {{ $datas->KegiatanTamu }}</td>
                <td>{{ $datas->date_time }}</td>
              </tr>  
              @endforeach
            </tbody>
          </table>

     </div>

     {{--  !! Pagination  --}}
     <div class="next">
      {{ $data->links() }}
     </div>
     
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>