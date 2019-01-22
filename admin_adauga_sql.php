<?php
  session_start();
  include 'dbconnect.php';

  $user_name = $_SESSION["nume_utilizator"];

  $data_mod = $_POST['data_mod'];
  $cod = $_POST['id_produs'];
  $nume_produs = $_POST['nume_produs'];
  $furnizor = $_POST['furnizor'];
  $categorie = $_POST['categorie'];
  $cantitate_cumparata =$_POST['cant_cumparata'];
  $cantitate_vanduta = "-----";
  $pret = $_POST['pret'];
  $actiune = "Cumparata";

  $sql2 = "SELECT * FROM produse WHERE nume_produs= '$nume'";
  $rez = mysqli_query($connect, $sql2);
  $verificare_cod = "SELECT * FROM produse WHERE cod_produs='$cod'";
  $verificare_cod_rez =mysqli_query($connect, $verificare_cod);
  $verificare_produs = "SELECT * FROM produse WHERE nume_produs='$nume'";
  $veriricare_produs_rez = mysqli_query($connect, $verificare_produs);

  if(mysqli_num_rows($verificare_cod_rez) > 0){
      header("Location:admin_modifica.php?error_cod");
  }else if(mysqli_num_rows($verificare_produs_rez) > 0){
      header("Location:admin_modifica.php?error_adaugare");
  }else{
    $sql  = "INSERT INTO produse VALUE('$cod', '$user_name', '$data_mod', '$nume_produs', '$furnizor', '$categorie', '$cantitate_cumparata', '$cantitate_vanduta', '$cantitate_cumparata', '$pret')";
    $rezultat = mysqli_query($connect,$sql);

    $modificari = "INSERT INTO modificari VALUE('','$user_name', '$nume_produs', '$categorie', '$actiune', '$cantitate_cumparata', '$pret', '$data_mod')";
    $rezultat = mysqli_query($connect, $modificari);
    header("Location:admin_modifica.php?produs_reusit");
  }
?>
