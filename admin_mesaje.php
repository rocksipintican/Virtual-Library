<!DOCTYPE html>

<html lang="en">
<?php
  session_start();
  if($_SESSION["loggedIn"] != true){
    //echo 'not logged in';
    header("Location: index.php");
    exit;
  }
 ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Mesaje - Managment stocuri </title>
  <link rel="stylesheet" text="text/css" href="assets/css/continut.css?<?=filemtime("assets/css/continut.css")?>"/>
  <link rel="stylesheet" text="text/css" href="assets/css/admin_mesaje.css?<?=filemtime("assets/css/admin_mesaje.css")?>"/>
</head>

<body>
  <?php include 'navigatie.php';
  ?>
  <main class="main_mesaje">
    <div class="mesaje_window">
      <table>
        <thead>
          <tr>
            <th> Nume si prenume </th>
            <th> Username </th>
            <th> Mesaj </th>
          </tr>
        </thead>
        <?php
            include 'dbconnect.php';
            $sql = "SELECT * FROM contact";
            $rezultat = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_assoc($rezultat)){
            echo "<tbody><tr>
                  <td>".$row['nume']."</td>
                  <td>".$row['username']."</td>
                  <td>".$row['mesaj']."</td></tr></tbody>";
            }
        ?>
      </table>
    </div>
  </main>
</body>
</html>
