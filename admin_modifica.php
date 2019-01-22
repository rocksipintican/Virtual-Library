<!DOCTYPE html>
<html lang="en">
<script>
  function Check()
  {
       {
        document.getElementById('pret_m').disabled = false;
      }
      else{
        document.getElementById('pret_m').disabled = true;
      }
  }
</script>
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
    <title> Adauga stocuri - Managment stocuri </title>
    <link rel="stylesheet" text="text/css" href="assets/css/continut.css?<?=filemtime("assets/css/continut.css")?>"/>
    <link rel="stylesheet" text="text/css" href="assets/css/ams.css?<?=filemtime("assets/css/ams.css")?>"/>
  </head>

  <body>
    <?php include 'navigatie.php';
    ?>
    <main class="main_schimbari">
      <div id="adauga_produs">
        <form class="schimbari_form" action="admin_adauga_sql.php" method="POST">
          <div class="main_informatii">
            <h1> Adauga pe stoc </h1>
          </div>
          <div class="introducere_error_produs">
            <?php
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl, "error_adaugare") == true)
                {
                    echo 'Produsul exista sau a intervenit o eroare!';
                }
            ?>
          </div>
          <div class="introducere_error_cod">
            <?php
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl, "error_cod") == true)
                {
                    echo 'Codul produsului exista deja!';
                }
            ?>
          </div>
          <div class="introducere_reusita">
            <?php
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl, "produs_reusit") == true)
                {
                    echo 'Produsul a fost inregistrat!';
                }
            ?>
          </div>
          <div class="main_continut">
            <label for="data"><strong>Data</strong></label>
            <input id="data" type="date" name="data_mod"><br>
            <label for="id_produs"><strong>ID</strong></label>
            <input id="id_produs" type="number" name="id_produs"><br>
            <label for="nume_produs"><strong>Produs</strong></label>
            <input id="nume_produs" type="text" name="nume_produs"><br>
            <label for="furnizor"><strong>Furnizor</strong></label>
            <input id="furnizor" type="text" name="furnizor"><br>
            <label for="categorie"><strong>Categorie</strong></label>
            <input id="categorie" type="text" name="categorie"><br>
            <label for="cantitate"><strong>Cantitate</strong></label>
            <input id="cantitate" type="number" name="cant_cumparata"><br>
            <label for="pret"><strong>Pret</strong></label>
            <input id="pret" type="number" name="pret" step="0.01"/><br>
          </div>
          <div class="button">
            <button type="submit">Adauga produsul</button>
          </div>
          <div class="button-reset">
            <button type="reset"> Sterge </button>
          </div>
        </form>
      </div>

        <div id="modifica_produs">
          <form class="schimbari_form" action="admin_adauga_modifica.php" method="POST">
            <div class="main_informatii">
              <h1> Modifica stocul </h1>
            <div class="modificare_error">
              <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if(strpos($fullUrl, "error_actiune") == true)
                  {
                      echo 'Nu ai selectat nici o actiune!';
                  }
              ?>
            </div>
            <div class="modificare_reusita">
              <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if(strpos($fullUrl, "modificare_succes") == true)
                  {
                      echo 'Produsul modificat!';
                  }
              ?>
            </div>
            <div class="main_continut">
              <label for="data">Data</label>
              <input id="data" type="date" name="data_mod"><br>
              <label for="nume_produs">Produs</label>
              <div class="main_continut_select">
                <select name="produse" id="selecteaza_produs">
                  <option hidden="true">Selecteaza produsul</option>
                  <option value="selecteaza_produs" disabled="disabled" default="true"> Selecteaza produsul </option>
                  <?php
                    include 'dbconnect.php';
                    $select = "SELECT * FROM produse";
                    $rezultatSelect = mysqli_query($connect, $select);
                    while($selectRow = mysqli_fetch_assoc($rezultatSelect))
                    {
                      ?>
                    <option value='<?php echo $selectRow['nume_produs'];?>'><?php echo $selectRow['nume_produs']; ?></option>
                  <?php } ?>
                </select>
              </div>
                <div class="main_continut_select_actiune">
                <select name="actiune" id="selecteaza_actiunea">
                  <option hidden="true" value="selecteaza_actiunea">Selecteaza</option>
                  <option value="selecteaza_actiunea" disabled="disabled" default="true"> Selecteaza</option>
                  <option value="Vanduta">Cantitate vanduta</option>
                  <option value="Adaugata">Cantitate adaugata</option>
                  <option value="modPret">Doar pret</option>
                </select>
              </div>
              <input type="text" name="cantitate" id="cantitate_admin"/><br>
              <label class="main_continut_checkbox">
                <input type="checkbox" id="modifica_pret" onclick="Check()">
                <span class="slider-round"></span>
              </label>
              <label>Pret</label>
              <input type="number" step="0.01" name="prodPret" id="pret_m" disabled><br>
            <div class="button">
              <button type="submit">Modifica</button>
            </div>
            <div class="button-reset">
              <button type="reset"> Sterge </button>
            </div>
          </div>
        </div>
      </form>
    </main>
</html>
