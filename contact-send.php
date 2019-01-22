<?php
    session_start();
    include 'dbconnect.php';

    //$nume = $_POST['prenume'];
    //$user = $_POST['username'];
    $nume = $_SESSION["nume_utilizator"];
    $user = $_SESSION["username"];
    $mesaj = $_POST['subject'];

    $sq1 = "INSERT INTO contact (nume, username, mesaj) VALUES('$nume', '$user', '$mesaj')";
    $rezultat = mysqli_query($connect, $sq1);

    if(!$rezultat){
        header("Location:contact.php?error");
    }
    else{
        header("Location:contact.php?trimis");
    }
?>
