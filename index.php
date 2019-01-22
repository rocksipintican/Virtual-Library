<!DOCTYPE html>
<html lang="en">
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login - Manager de stocuri </title>
    <link rel="stylesheet" text="text/css" href="assets/css/login.css?<?=filemtime("assets/css/login.css")?>"/>
  </head>


  <body>
    <main class="main_login">
      <form class="form_login" action="login_check.php" method="POST">
        <div class="login_window">
          <div class="login_continut">
            <div class="login_image">
              <image src="assets/image/login.png" alt="login photo">
            </div>
            <h1> LOG IN </h1>
            <div class="login_error">
              <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if(strpos($fullUrl, "error") == true)
                  {
                      echo 'Check your input! Username or password incorect!';
                  }
              ?>
            </div>
            <div class="login_delogare_succes">
              <?php
              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if(strpos($fullUrl, "delogat") == true)
              {
                  echo 'Te-ai delogat cu succes!';
              }
              ?>
            </div>
            <div class="login_inregistrat">
              <?php
              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if(strpos($fullUrl, "inregistrat") == true)
              {
                  echo 'Te-ai inregistrat cu succes!';
              }
              ?>
            </div>
            <div class="login_input">
              <label for="username"> Username </label>
              <input id="username" name="username" type="text" placeholder="username" required>
              <label for="password"> Password </label>
              <input id="password" name="password" type="password" placeholder="password" required>
            </div>
            <div class="login_button">
              <button type="submit">Login</button>
            </div>
            <div class="login_register">
              <p>Nu ai cont?<a href="register.php"> Inregistreaza-te</a></p>
            </div>
        </div>
      </form>
    </main>
  </body>
</html>
