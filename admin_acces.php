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
  <title> Accese - Managment stocuri </title>
  <link rel="stylesheet" text="text/css" href="assets/css/continut.css?<?=filemtime("assets/css/continut.css")?>"/>
  <link rel="stylesheet" text="text/css" href="assets/css/admin_acces.css?<?=filemtime("assets/css/admin_acces.css")?>"/>
</head>

<body>
  <?php include 'navigatie.php';
  ?>
  <main class="main_acces">
    <div class="form_user">
      <form action="admin_accese_sql.php" method="POST">
          <div class="accese_window">
            <div class="accese_continut">
              <div class="accese_image">
                <img src="assets/image/man.png" alt="poza_form">
              </div>

              <div class="accese_error">
                <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if(strpos($fullUrl, "error") == true)
                    {
                        echo 'A intervenit o eroare!';
                    }
                ?>
              </div>

              <div class="accese_input">
                <label for="nume">Nume</label>
                <input type="text" id="nume" name="nume" placeholder="Nume si Prenume"><br>
                <label for="username">Utilizator</label>
                <input type="text" id="username" name="username" placeholder="Utilizator"><br>
                <label for="acces">ID Acces</label>
                <input type="text" id="acces" name="id_acces" placeholder="Grad acces"><br>
              </div>
              <div class="accese_button">
                <button type="submit">Schimba</button>
              </div>
              </div>
            </div>
          </div>
      </form>
    <div class="afisare_user">
        <table>
          <thead>
            <tr>
                <th>Nume</th>
                <th>Utilizator</th>
                <th>Email</th>
                <th>Grad</th>
            </tr>
          </thead>
            <?php
                include 'dbconnect.php';
                $sql = "SELECT * FROM users";
                $rezultat = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_assoc($rezultat)){
                echo "<tbody><tr>
                      <td>".$row['nume']."</td>
                      <td>".$row['username']."</td>
                      <td>".$row['Email']."</td>
                      <td>".$row['tip_acces']."</td></tr></tbody>";
                }
            ?>
        </table>
    </div>
  </main>
</body>
</html>
