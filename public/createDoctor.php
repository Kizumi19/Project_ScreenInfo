<?php
include(__DIR__ . '/connect.php');
include(__DIR__ . '/../inc/doctors.php');

 function CrearDoctor($id, $name, $surname, $specialty_id, $location_id) {
    $connexioDB = conn();
    
    $id = 9;
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $specialty_id = $_POST['specialty_id'];
    $location_id = $_POST['location_id'];

    $sql = "INSERT INTO Doctor VALUES('$id','$name', '$surname', '$specialty_id', '$location_id')";
    $query = mysqli_query($connexioDB, $sql);
}
