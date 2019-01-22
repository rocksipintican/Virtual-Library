<?php
    $host = "localhost";
    $host_n = "root";
    $host_p = "";
    $db = "managerstocuri";

    $connect = mysqli_connect($host, $host_n, $host_p);
    mysqli_select_db($connect, $db);


    //Modificari produse
    $sql = "SELECT * FROM modificari";
    $rezultat = mysqli_query($connect, $sql);

?>
