<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Tamu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
<body>
   
        
 @if ($errors->any())
    <div class="messange">
      <div class="alert alert-danger" role="alert">
          @foreach ($errors->all() as $Absen)   
              <li>{{ $Absen }}</li>
          @endforeach
      </div>
    </div>

 @endif
        <div class="form_login ">      
            <h1>Edit Daftar Tamu</h1>
        <form action="{{ url('DaftarTamu/'.$data->id) }}" method="post">

            @csrf
            
            @method('PUT')

            <div class="mt-4 ">
                <label for="text" class="form-label">nama</label>
                <input type="text" autocomplete="off"value="{{ $data->nama }}" name="nama" id="" class="input">
              </div>
              
            <div class="mt-4">
                <label for="text" class="form-label">Alamat</label>
                <input type="text" autocomplete="off" value="{{$data->Alamat }}"  name="Alamat" id="" class="input">
              </div>
              
            <div class="mt-4">
                <label for="text" class="form-label">No_Hp</label>
                <input type="text" name="No_Hp" autocomplete="off" value="{{ $data->No_Hp }}" id="" class="input">
              </div>
              
             
              <div class="mb-3 d-grid">
                <button name="submit" class="btn btn-primary btnsubmit" type="submit">Save</button>
              </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>