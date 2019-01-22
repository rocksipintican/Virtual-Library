<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Contact - Managment stocuri </title>
    <link rel="stylesheet" text="text/css" href="assets/css/continut.css?<?=filemtime("assets/css/continut.css")?>"/>
    <link rel="stylesheet" text="text/css" href="assets/css/contact.css?<?=filemtime("assets/css/contact.css")?>"/>
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
    <?php include 'navigatie_user.php'; ?>

    <main class="main_mesaje">
      <div class="mesaje">
        <div class="image">
          <image src="assets/image/chat.png" alt="poza-mesaj">
        </div>
        <div class="rubrica_mesaj">
          <form action="contact-send.php" method="POST">
              <p>Trimite-ne un mesaj daca doriti sa luati legatura cu noi.</p>
              <textarea id="subject" name="subject" style="height:200px" placeholder="Write something..."></textarea><br>
              <input type="submit" value="Trimite" class="trimite-button">
          </form>
      </div>
      </div>
    </main>
  </body>

</html>
