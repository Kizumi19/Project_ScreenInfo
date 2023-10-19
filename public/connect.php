<?php
$servername = "mariadb";
$database = "Screen";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername, $username, $password, $database);

// Per acceptar accents
mysqli_query($conn, "SET NAMES 'utf8'");

if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

?>