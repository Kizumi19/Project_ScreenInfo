<?php

    $servername = "mariadb";
    $database = "Screen";
    $username = "root";
    $password = "root";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("La connexió ha fallat:" . mysqli_connect_error());
    }    
?>