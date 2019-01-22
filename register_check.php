<?php
  session_start();
  include 'dbconnect.php';


  $nume_utilizator= strip_tags($_POST['nume']);
  $utilizator = strip_tags(trim($_POST['username'])); //trim curata de white space
  $parola = strip_tags(trim($_POST['password']));
  $email = $_POST['email'];
  $tip_acces = "0";
  $bun = true;

    if(strlen($nume_utilizator) < 5)
    {
      $bun = false;
      header("Location:register.php?errorCampGol");
    }
    if(strlen($_POST['username']) < 5)
    {
      $bun = false;
      header("Location:register.php?errorUsername");
    }
    if(strlen($parola) < 6)
    {
      $bun = false;
      header("Location:register.php?errorPassword");
     }
    if(strlen($email) < 5)
    {
      $bun = false;
      header("Location:register.php?errorEmail");
    }


  if($bun){
    $register_check ="SELECT * FROM users WHERE username='$utilizator'";
    $register_check_name = "SELECT * FROM users WHERE nume='$nume_utilizator'";

    $register_check_result = mysqli_query($connect, $register_check);
    $register_check_name_result = mysqli_query($connect, $register_check_name);
    if(mysqli_num_rows($register_check_result) > 0 || mysqli_num_rows($register_check_name_result) > 0)
    {
      header("Location:register.php?userError");
    }
    else{
      $parola  = md5($parola);
      $register = "INSERT INTO users(nume, username, Email, password, tip_acces) VALUES ('$nume_utilizator', '$utilizator', '$email', '$parola', '$tip_acces')";
      mysqli_query($connect, $register);
      header("Location:index.php?inregistrat");
    }
  }
  mysqli_close($connect);

?>
