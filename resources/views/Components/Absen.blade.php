<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
<body>


    {{-- !!Navbar   --}}

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
     <li class="{{ ($Title === "Profile")? "actif" : "" }}"><a href="/AktifitasTamu">Aktifitas Tamu</a> 
     </li>
    </div>
    <a href="/LogOut"><button class="butten1">Log Out</button></a>
 </div>

 {{--  !! messange session  --}}
        
 @if ($errors->any())
    <div class="messange">
      <div class="alert alert-danger" role="alert">
          @foreach ($errors->all() as $Absen)   
              <li>{{ $Absen }}</li>
          @endforeach
      </div>
    </div>

 @endif

      {{--  !! form absen  --}}

        <div class="formlogin ">      
            <h1>Absen</h1>
        <form action="/Absen" method="post">

            @csrf
            

            <div class="mt-4 ">
                <label for="text" class="form-label">nama</label>
                <input type="text" autocomplete="off"value="{{ Session::get('nama') }}" name="nama" id="" class="input">
              </div>
              
            <div class="mt-4">
                <label for="text" class="form-label">Alamat</label>
                <input type="text" autocomplete="off" value="{{ Session::get('Alamat') }}"  name="Alamat" id="" class="input">
              </div>
              
            <div class="mt-4">
                <label for="text" class="form-label">No_Hp</label>
                <input type="text" name="No_Hp" autocomplete="off" value="{{ Session::get('No_Hp') }}" id="" class="input">
              </div>
              
             
              <div class="mb-3 d-grid">
                <button  @click="myFunction()" name="submit" class="btn btn-primary btnsubmit" type="submit">Send</button>
              </div>
        </form>

    </div>
    
  {{--  !! fake loading  --}}
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>