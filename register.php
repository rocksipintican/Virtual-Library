<!DOCTYPE html>
<html lang="en">
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Register - Manager de stocuri </title>
    <link rel="stylesheet" text="text/css" href="assets/css/register.css?<?=filemtime("assets/css/register.css")?>"/>
  </head>


  <body>
    <main class="main_register">
      <form class="form_register" action="register_check.php" method="POST">
        <div class="register_window">
          <div class="register_continut">
            <div class="register_image">
              <image src="assets/image/register.png" alt="register photo">
            </div>
            <h1> Register </h1>
            <div class="register_error">
              <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if(strpos($fullUrl, "errorCampGol") == true)
                  {
                      echo 'Name lenght must be minimum 5 characters or higher';
                  }
              ?>
            </div>
            <div class="register_error">
              <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if(strpos($fullUrl, "errorUsername") == true)
                  {
                      echo 'Username lenght must be minimum 5 characters or higher';
                  }
              ?>
            </div>
            <div class="register_error">
              <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if(strpos($fullUrl, "errorPassword") == true)
                  {
                      echo 'Password length must be minimum 5 characters or higher';
                  }
              ?>
            </div>
            <div class="register_error">
              <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if(strpos($fullUrl, "errorEmail") == true)
                  {
                      echo 'Please enter a email address!';
                  }
              ?>
            </div>
            <div class="register_error">
              <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if(strpos($fullUrl, "userError") == true)
                  {
                      echo 'Username or Name already exist!';
                  }
              ?>
            </div>
            <div class="register_input">
              <label for="nume"> Nume </label>
              <input id="nume" name="nume" type="text" placeholder="Nume si prenume">
              <label for="username"> Username </label>
              <input id="username" name="username" type="text" placeholder="username">
              <label for="password"> Password </label>
              <input id="password" name="password" type="password" placeholder="password">
              <label for="email">Email</label>
              <input id="email" name="email" type="email" placeholder="email">
            </div>
            <div class="register_button">
              <button type="submit">Login</button>
            </div>
            <div class="back_to_login">
              <p>Ai cont?<a href="index.php">Go to login</a></p>
            </div>
        </div>
      </form>
    </main>
  </body>
</html>
