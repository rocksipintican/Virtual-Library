<?php
  session_start();
  include 'dbconnect.php';
  global $connect;

  $numePrenume = $_POST['nume'];
  $username = $_POST['username'];
  $grad = $_POST['id_acces'];
  $superPassword = $_POST['password'];
  $admin_user = "admin";

  $verificare_numePrenume = "SELECT * FROM users WHERE nume='$numePrenume'";
  $verificare_numePrenume_rez =mysqli_query($connect, $verificare_numePrenume);
  $verificare_username = "SELECT * FROM users WHERE username='$username'";
  $verificare_username_rez =mysqli_query($connect, $verificare_username);

  $superPasswordVerificare = "SELECT * FROM users WHERE username='$admin_user'";
  $rez = mysqli_query($connect, $superPasswordVerificare);
  $row = mysqli_fetch_array($connect, $rez);

  if($row['password'] != $superPassword){
    header("Location:admin_acces.php?error");
  }else{
    $update = "UPDATE users SET `tip_acces`='$grad' WHERE users.username='$username'";
    $mysql_query = mysqli_query($connect, $update);
    header("Location:admin_acces.php?succes");
  }
?>
