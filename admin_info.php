<!DOCTYPE html>

<html lang="en">
<?php
  session_start();
  if($_SESSION["loggedIn"] != true){
    //echo 'not logged in';
    header("Location: index2.php");
    exit;
  }
 ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Informatii - Managment stocuri </title>
  <link rel="stylesheet" text="text/css" href="assets/css/continut.css?<?=filemtime("assets/css/continut.css")?>"/>
  <link rel="stylesheet" text="text/css" href="assets/css/admin_info.css?<?=filemtime("assets/css/admin_info.css")?>"/>
</head>

<body>
  <?php include 'navigatie.php';
  ?>
  <main class="main_info">
    <table class="tabel">
      <thead>
        <tr>
            <th>Nume si prenume</th>
            <th>Produs</th>
            <th>Categorie</th>
            <th>Actiune</th>
            <th>Cantitate</th>
            <th>Pret</th>
            <th>Data modificari</th>
        </tr>
      </thead>
        <?php
          include 'dbconnect.php';
          $sql = "SELECT * FROM modificari";
          $rezultat = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_assoc($rezultat)){
          echo "<tbody><tr>
                  <td>".$row['nume']."</td>
                  <td>".$row['nume_produs']."</td>
                  <td>".$row['categorie']."</td>
                  <td>".$row['Actiune']."</td>
                  <td>".$row['Cantitate']."</td>
                  <td>".$row['pret_nou']."</td>
                  <td>".$row['data_modificari']."</td></tr></tbody>";
            }
        ?>
    </table>

  </main>
</body>
</html>
