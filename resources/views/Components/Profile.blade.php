<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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

     <h1 class="texttamu">Profile</h1>

     <div class="border_profile">
        <div class="card_profile">
            <div class="pp"></div>
           <button class="change">
            Change
           </button>
        </div>
        <div class="Form_profile"></div>
     </div>
</body>
</html>