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
   

    <div class="winodws_Login">
      <div class="Login">
        <div class="logo_Login">
            <h1 class="Logo_text">
              <b class="satu">F</b><b class="dua">J</b>
            Tamu
            </h1>
         </div>

            @if ($errors->any())
        
        <div class="messange">

          <div class="alert alert-danger" role="alert">
              @foreach ($errors->all() as $item)   
                  <li>{{ $item }}</li>
              @endforeach
          </div>
        </div>

    @endif



         <div class="welcome">
          <h4 class="text_welcome">Create your free account</h4>
          <h4 class="p_welcome">Let's get you all set up so you can start creating your first onbording experience </h4>
        </div>

        {{--  !! perpindahan antara login atau register  --}}
        <div class="perpindahan_login_signup">
          <button type="button" class="{{ $Title === 'Login'?'':'Login_swift' }}"><a href="Login" class="link_move">Sign In</a></button>

          <button  class="{{ $Title === 'Register'?'Login_swif':'' }}" type="button" >Sign Up</button>
          </div>
     
          <form action="/Register" method="post">

            @csrf

            {{--  !! Input name  --}}
            <div class="border_input_name_Register">
              <input type="text" name="name" 
              placeholder="Masukan Nama Anda"
              id="" autocomplete="off" value="{{ Session::get('name') }}" class="input_form">
              
            </div>
            
            {{--  !! Input Gamil  --}}
            <div class="border_input_gmail_Register">
              <input value="{{ Session::get('email') }}" type="email" name="email" id="" 
              placeholder="Masukan Gmail Anda"
              autocomplete="off" class="input_form">
            </div>
            
            {{--  !! Input password  --}}
            <div class="border_input_password_Register">
              <input type="password" name="password" id="" 
              placeholder="Masukan Password Anda"
              autocomplete="off" class="input_form">
              
            </div>
            <button type="submit" class="continue_Register">Continue</button>
            
          </form>
        <div class="border_or_login_Register">
          <div class="line"></div>  
          <h2 class="or_continue_with">Or Continue With</h2>          
          <div class="line"></div>  
        </div>

        <div class="choice_login_Register">
          <a class="google" href="{{ route('auth.google') }}"></a>
            <a href="{{ route('auth.github') }}" class="google2"></a>
            <a class="google1" href="{{ route('auth.facebook') }}"></a>
        
        </div>

        <div class="border_text_tamu_Register">
          <p class="text_paragraf">Terima kasih telah memilih kami sebagai tempat Anda berkunjung. Silakan tinggalkan pesan Anda di buku tamu.</p>
        </div>
        
      </div>

      {{--  !! Login Background  --}}
      <div class="Login_background_fixid"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>