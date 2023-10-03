<?php

include_once(__DIR__ . '/connect.php');  // Primero establece la conexión
include_once(__DIR__ . '/Classes/doctors.php');  // Luego incluye las clases que dependen de la conexión

function create_normal() {
    global $connexioDB;  // Usa la conexión establecida

    $id = 9;
    $name = $_POST['Nom'];
    $surname = $_POST['Cognom'];
    $specialty_id = $_POST['id_especialitat'];
    $location_id = $_POST['id_localitzacio'];
    $hidden = 0;

    $sql = "INSERT INTO Doctor VALUES('$id','$name', '$surname', '$specialty_id', '$location_id', '$hidden')";
    $query = mysqli_query($connexioDB, $sql);
    
}
$Doctor = new Doctor($id, $name, $surname, $specialty_id, $location_id, $hidden);
$Doctor->create_normal(); 
