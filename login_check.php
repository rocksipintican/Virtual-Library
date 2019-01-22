<?php
  session_start();
  include 'dbconnect.php';
  global $connect;

  $utilizator =  filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $parolamd5 = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
  $parola = md5($parolamd5);

  $sql = "SELECT * FROM users WHERE username='$utilizator' AND password='$parola'";
  $sql2 = "SELECT * FROM users WHERE username='$utilizator'";

 $rezultat = mysqli_query($connect, $sql) or die(mysql_error());
  $rezultat2 = mysqli_query($connect, $sql2) or die(mysql_error());

  $row = mysqli_fetch_array($rezultat);
  $row2 = mysqli_fetch_array($rezultat2);
  
  $nume_utilizator = $row2['nume'];

  $sql2 = "SELECT * FROM users WHERE username='$utilizator' AND password='$parolamd5'";
  $rezultat2 = mysqli_query($connect, $sql2) or die(mysql_error());
  $row2 = mysqli_fetch_array($rezultat2);


  if($row2['username'] == $utilizator && $row2['password'] == $parolamd5 && $row2['tip_acces'] == 1)
  {
    $_SESSION["nume_utilizator"] = $nume_utilizator;
    $_SESSION["loggedIn"] = true;
    $_SESSION["admin"] = true;
    header("Location:produse.php");
  }else if($row2['username'] == $utilizator && $row2['password'] == $parolamd5 && $row2['tip_acces'] == 0){
      $_SESSION["nume_utilizator"] = $nume_utilizator;
      $_SESSION["username"] = $utilizator;
      $_SESSION["loggedIn"] = true;
      $_SESSION["admin"] = false;
      header("Location:produse.php");
  }else if($row['username'] == $utilizator && $row['password'] == $parola && $row['tip_acces'] == 1)
  {
    $_SESSION["nume_utilizator"] = $nume_utilizator;
    $_SESSION["loggedIn"] = true;
    $_SESSION["admin"] = true;
    header("Location:produse.php");
  }else if($row['username'] == $utilizator && $row['password'] == $parola && $row['tip_acces'] == 0){
      $_SESSION["nume_utilizator"] = $nume_utilizator;
      $_SESSION["username"] = $utilizator;
      $_SESSION["loggedIn"] = true;
      $_SESSION["admin"] = false;
      header("Location:produse.php");
  }else{
      header("Location:index.php?error");
  }

  //mysqli_free_result($rezultat);

?>
