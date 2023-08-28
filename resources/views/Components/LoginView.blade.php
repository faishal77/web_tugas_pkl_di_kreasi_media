

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

    {{--  <div class="background_Loading">
      <div class="move_loading">
        <div class="ping"></div>
      </div>  --}}

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
            <h4 class="text_welcome">Welcome Back</h4>
            <h4 class="p_welcome">Welcome Back,Please Enter Your Details </h4>
          </div>

          {{--  !! perpindahan antara login atau register  --}}
          <div class="perpindahan_login_signup">
            <button type="button" class="{{ $Title === 'Login'?'Login_swif':'Login_Swift' }}">Sign In</button>

            <button  class="{{ $Title === 'Register'?'Login_swif':'Login_swift' }}" type="button" ><a href="Register" class="link_move">Sign Up</a></button>
            </div>

            <form action="/Login" method="post">

              @csrf
              
              {{--  !! Input Gmail  --}}
              <div class="border_input">
                  <input value="{{ Session::get('email') }}" type="email" name="email" id="" 
                  placeholder="Masukan Gmail Anda"
                  autocomplete="off"  class="input_form">
              </div>
              
              {{--  !! Input password  --}}
              <div class="border_input_password">
                <input type="password" name="password" id="" autocomplete="off" 
                placeholder="Masukan Password Anda"
                class="input_form">
              </div>
              <button type="submit" class="continue">Continue</button>
              
            </form>

            {{--  !link forgot password  --}}
            <a class="Forgot_Password" href="{{ route('password.request') }}">Forgot Password?</a>

            
            <div class="border_or_login">
            <div class="line"></div>  
            <h2 class="or_continue_with">Or Continue With</h2>          
            <div class="line"></div>  
          </div>

          <div class="choice_login">
            <a class="google" href="{{ route('auth.google') }}"></a>
            <a href="{{ route('auth.github') }}" class="google2"></a>
            <a class="google1" href="{{ route('auth.facebook') }}"></a>
        
          </div>
          <div class="border_text_tamu">
            <p class="text_paragraf">Terima kasih telah memilih kami sebagai tempat Anda berkunjung. Silakan tinggalkan pesan Anda di buku tamu.</p>
          </div>
        </div>

        {{--  !! Login Background  --}}
        <div class="Login_background"></div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>