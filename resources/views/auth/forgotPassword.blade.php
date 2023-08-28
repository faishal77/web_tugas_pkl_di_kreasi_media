<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">            

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>

   <div class="border_forgot_password">
    <div class="border_right_pp">
        <div class="border_ilustrator"></div>
    </div>

    <div class="border_keterangan_forgot_password">
        <h1 class="text_forgot_password">Forgot Password?</h1>
        <p class="p_text_forgot_password">Enter the email address associated with your account.</p>
      
        @if (session()->has('status'))
        <div class="status">
          <li>{{ session()->get('status') }}</li>
        </div>
        @endif
  <form  method="post">

        @csrf

        <div class="form_forgot_password">

            <div class="row">
              <div class="col s12">
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input autocomplete="off" type="email" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">Masukan Email</label>
                  </div>
                </div>
              </div>
          </div>
          
          <button class="btn waves-effect waves-light button_submit_forgot_password" type="submit" name="action">Submit
              <i class="material-icons right">send</i>
            </button>
        </div>

    </form>      
    </div>
   </div>


   <script type="text/javascript" src="js/materialize.min.js"></script>
   <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html