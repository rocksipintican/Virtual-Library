<?php
  session_start();
  include 'dbconnect.php';
  global $connect;

  $nume_utilizator = $_SESSION['nume_utilizator'];
  $data = $_POST['data_mod'];
  $nume_produs = $_POST['produse'];
  $actiune = $_POST['actiune'];
  $cantitate = $_POST['cantitate'];
  $pret = $_POST['prodPret'];

  $nemodificat = "nemodificat";
  $modificare_pret = "Modificare pret";


  $categorie = "SELECT * FROM produse WHERE nume_produs='$nume_produs'";
  $rezultat_categorie = mysqli_query($connect, $categorie);
  $row = mysqli_fetch_array($rezultat_categorie);
  $select_categorie = $row['categorie'];

  if($_POST['actiune'] == 'selecteaza_actiunea')
  {
    header("Location:admin_modifica.php?error_actiune");
  }else {
    if($pret == null && $_POST['actiune'] == 'Vanduta')
    {
        $sql = "UPDATE produse SET `data_mod`='$data', `cantitate_vanduta`=`cantitate_vanduta` + '$cantitate', `cantitate_ramasa`= `cantitate_ramasa` - '$cantitate' WHERE produse.nume_produs='$nume_produs'";
        mysqli_query($connect, $sql);

        $modificari2 = "INSERT INTO `modificari` VALUES(NULL,'$nume_utilizator', '$nume_produs', '$select_categorie', '$actiune', '$cantitate','$nemodificat' , '$data')";
        $rezultat = mysqli_query($connect, $modificari2);
    }else if($pret == null && $_POST['actiune'] == 'Adaugata')
    {
        $sql = "UPDATE produse SET `data_mod`='$data', `cantitate_cumparata`=`cantitate_cumparata` + '$cantitate', `cantitate_ramasa`= `cantitate_ramasa` + '$cantitate' WHERE produse.nume_produs='$nume_produs'";
        mysqli_query($connect, $sql);

        $modificari2 = "INSERT INTO `modificari` VALUES(NULL,'$nume_utilizator', '$nume_produs', '$select_categorie', '$actiune', '$cantitate', '$nemodificat','$data')";
        $rezultat = mysqli_query($connect, $modificari2);
    }else if($_POST['actiune'] =='Vanduta' && $pret != null)
    {
        $sql = "UPDATE produse SET `data_mod`='$data', `cantitate_vanduta` = `cantitate_vanduta` + '$cantitate', `cantitate_ramasa`= `cantitate_ramasa` - '$cantitate', `pret_produs`='$pret' WHERE produse.nume_produs='$nume_produs'";
        mysqli_query($connect, $sql);

        $modificari = "INSERT INTO modificari VALUE('','$nume_utilizator', '$nume_produs', '$select_categorie', '$actiune', '$cantitate', '$pret', '$data')";
        $rezultat = mysqli_query($connect, $modificari);
    }else if($_POST['actiune'] == 'Adaugata' && $pret != null)
    {
        $sql = "UPDATE produse SET `data_mod`='$data', `cantitate_cumparata`=`cantitate_cumparata` + '$cantitate', `cantitate_ramasa`= `cantitate_ramasa` + '$cantitate', `pret_produs`='$pret' WHERE produse.nume_produs='$nume_produs'";
        mysqli_query($connect, $sql);

        $modificari = "INSERT INTO modificari VALUE('','$nume_utilizator', '$nume_produs', '$select_categorie', '$actiune', '$cantitate', '$pret', '$data')";
        $rezultat = mysqli_query($connect, $modificari);
    }else if($_POST['actiune'] == 'modPret' && $pret !=null)
    {
        $sql = "UPDATE produse SET `data_mod`='$data', `pret_produs`='$pret' WHERE produse.nume_produs='$nume_produs'";
        mysqli_query($connect, $sql);

        $modificari = "INSERT INTO modificari VALUE('','$nume_utilizator', '$nume_produs', '$select_categorie', '$actiune2', '$nemodificat', '$pret', '$data')";
        $rezultat = mysqli_query($connect, $modificari);
      }
      header("Location:admin_modifica.php?modificare_succes");
  }

?>
