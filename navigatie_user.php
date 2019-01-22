<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" text="text/css" href="assets/css/menu.css?<?=filemtime("assets/css/menu.css")?>"/>
  </head>

  <body>
    <nav class="menu" id="myMenu">
      <a href="produse.php" id="active">Produse</a>
      <a href="contact.php"> Contact</a>
      <a href="http://webspace.ulbsibiu.ro/aurel.hila/">CV</a>
      <a href="https://csac.ulbsibiu.ro">CSAC</a>
      <a href="logout.php" class="logout">Logout</a>
      <a href="javascript:void(0);"class="icon" onclick="menu_responsive()">&#9776;</a>
    </nav>
    <script>
      function menu_responsive() {
        var x = document.getElementById("myMenu");
        if (x.className === "menu") {
            x.className += " responsive";
        } else {
            x.className = "menu";
        }
      }

      for (var i = 0; i < document.links.length; i++) {
        if (document.links[i].href == document.URL) {
        document.links[i].className = 'active';
        }
      }
    </script>
  </body>
