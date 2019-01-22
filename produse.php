<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Produse - Managment stocuri </title>
    <link rel="stylesheet" text="text/css" href="assets/css/continut.css?<?=filemtime("assets/css/continut.css")?>"/>
  </head>
  <?php
    session_start();
    if($_SESSION["loggedIn"] != true){
      //echo 'not logged in';
      header("Location: index.php");
      exit;
    }
    ?>
  <body>
    <?php
      if($_SESSION["admin"] != true){
        include 'navigatie_user.php';
      }else include 'navigatie.php';
     ?>
    <main class="main_tabel">
      <table>
        <thead>
        <tr>
          <th>Cod produs</th>
          <th>Nume produs</th>
          <th>Furnizor</th>
          <th>Categorie</th>
          <th>Cantitate cumparata</th>
          <th>Cantitate vanduta</th>
          <th>Cantitate in stoc</th>
          <th>Pret LEI/bucata</th>
      </tr>
    </thead>
      <?php
          include 'dbconnect.php';
          $sql = "SELECT * FROM produse";
          $rezultat = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_assoc($rezultat)){
          echo "<tbody><tr>
                <td>".$row['cod_produs']."</td>
                <td>".$row['nume_produs']."</td>
                <td>".$row['furnizor_produs']."</td>
                <td>".$row['categorie']."</td>
                <td>".$row['cantitate_cumparata']."</td>
                <td>".$row['cantitate_vanduta']."</td>
                <td>".$row['cantitate_ramasa']."</td>
                <td>".$row['pret_produs']."</td></tr></tbody>";
          }
      ?>
      </table>
    </main>
</html>
