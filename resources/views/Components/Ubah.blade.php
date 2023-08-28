<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <a href="/DaftarTamu"><button type="submit">Back To Daftar Tamu</button></a>
    @if ($errors->any())
    <div class="messange">
      <div class="alert alert-danger" role="alert">
          @foreach ($errors->all() as $Absen)   
              <li>{{ $Absen }}</li>
          @endforeach
      </div>
    </div>

 @endif

 <h1>ini data dari nama{{ $datas->nama }}</h1>
        <div class="formlogin ">      
            <h1>Ubah Daftar Tamu</h1>
        <form action="{{ '/DaftarTamu'.$datas->nama }}" method="post">
            @csrf
            @method('put')

            <div class="mt-4 ">
                <label for="text" class="form-label">nama</label>
                <input type="text" autocomplete="off"value="{{ $datas->nama }}" name="nama" id="" class="input">
              </div>
              
            <div class="mt-4">
                <label for="text" class="form-label">Alamat</label>
                <input type="text" autocomplete="off" value="{{  $datas->Alamat }}"  name="Alamat" id="" class="input">
              </div>
              
            <div class="mt-4">
                <label for="text" class="form-label">No_Hp</label>
                <input type="text" name="No_Hp" autocomplete="off" value="{{$datas->No_Hp }}" id="" class="input">
              </div>
              
             
              <div class="mb-3 d-grid">
                <button name="submit" class="btn btn-primary btnsubmit" type="submit">Send</button>
              </div>
        </form>

    </div>

</body>
</html>